/**
 * Copyright (c) 2018 Elliot Nunn
 * Copyright (c) 2021 ScummVM Team
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/**
 * This file is ported from
 * https://github.com/elliotnunn/machfs/blob/master/machfs/main.py
 */


import * as bitmanip from './bitmanip';
import * as btree from './btree';
import { AbstractFolder, FileOrFolder, MacFile, MacFolder } from './directory';
import { charCode, joinBytes, bytes } from '../util';
import struct from '../struct';


function _get_every_extent(nblocks: number, firstrecord: Uint8Array, cnid: number, xoflow: {[key: string]: Uint8Array}, fork: string): [number, number][] {
    let accum = 0;
    const extlist = [];

    for (const [a, b] of btree.unpack_extent_record(firstrecord)) {
        if (!b) continue;
        accum += b;
        extlist.push([a, b]);
    }

    while (accum < nblocks) {
        const nextrecord = xoflow[cnid + ',' + fork + ',' + accum];
        for (const [a, b] of btree.unpack_extent_record(nextrecord)) {
            if (!b) continue;
            accum += b;
            extlist.push([a, b]);
        }
    }

    return extlist;
}


export class Volume extends AbstractFolder {
    crdate: number;
    mddate: number;
    bkdate: number;
    name: string;

    constructor() {
        super();

        this.crdate = this.mddate = this.bkdate = 0;
        this.name = 'Untitled';
    }

    findMagicNumber(from_volume: Uint8Array): number {
        // Image data starts at 0x54 in DiskCopy 4.2 format https://wiki.68kmla.org/DiskCopy_4.2_format_specification

        for (const startOffset of [0x0, 0x54]) {
            for (let i = startOffset; i < from_volume.length; i += 512) {
                if (from_volume[i+1024] === charCode('B') && from_volume[i+1024+1] === charCode('D')) {
                    return i;
                }
            }
        }
    
        return -1;
    }

    read(from_volume: Uint8Array): void {
        const magicOffset = this.findMagicNumber(from_volume);
        if (magicOffset < 0) {
            throw new Error('Magic number not found in image');
        }
        if (magicOffset > 0) {
            from_volume = from_volume.subarray(magicOffset);
        }

        const [drSigWord, drCrDate, drLsMod, drAtrb, drNmFls,
            drVBMSt, drAllocPtr, drNmAlBlks, drAlBlkSiz, drClpSiz, drAlBlSt,
            drNxtCNID, drFreeBks, drVN, drVolBkUp, drVSeqNum,
            drWrCnt, drXTClpSiz, drCTClpSiz, drNmRtDirs, drFilCnt, drDirCnt,
            drFndrInfo, drVCSize, drVBMCSize, drCtlCSize,
            drXTFlSize, drXTExtRec,
            drCTFlSize, drCTExtRec]
        = struct('>2sLLHHHHHLLHLH28pLHLLLHLL32sHHHL12sL12s').unpack_from(from_volume, 1024);

        this.crdate = drCrDate;
        this.mddate = drLsMod;
        this.bkdate = drVolBkUp;

        const block2offset = (block: number) => 512*drAlBlSt + drAlBlkSiz*block;
        const getextents = (extents: [number, number][]) => joinBytes(
            extents.map(
                ([firstblk, blkcnt]: [number, number]) => from_volume.subarray(
                    block2offset(firstblk),
                    block2offset(firstblk+blkcnt)
                )
            )
        );
        const getfork = (size: number, extrec1: Uint8Array, cnid: number, fork: string) => getextents(
            _get_every_extent(
                Math.floor((size+drAlBlkSiz-1)/drAlBlkSiz),
                extrec1, cnid, extoflow, fork
            )
        ).subarray(0, size);

        const extoflow: {[key: string]: Uint8Array} = {};
        for (const rec of btree.dump_btree(getfork(drXTFlSize, drXTExtRec, 3, 'data'))) {
            if (rec[0] != 7) continue;
            const [xkrFkType, xkrFNum, xkrFABN, extrec] = struct('>xBLH12s').unpack_from(rec);
            let fork: string;
            if (xkrFkType === 0xFF)
                fork = 'rsrc';
            else if (xkrFkType === 0)
                fork = 'data';
            extoflow[xkrFNum + ',' + fork + ',' + xkrFABN] = extrec;
        }

        const cnids: {[id: number]: FileOrFolder} = {};
        const childlist: [number, Uint8Array, FileOrFolder][] = []; // list of [parent_cnid, child_name, child_object] tuples

        for (const rec of btree.dump_btree(getfork(drCTFlSize, drCTExtRec, 4, 'data'))) {
            // create a directory tree from the catalog file
            const rec_len = rec[0];
            if (rec_len === 0) continue;

            const key = rec.subarray(2, 1+rec_len);
            const val = rec.subarray(bitmanip.pad_up(1+rec_len, 2));

            const [ckrParID, namelen] = struct('>LB').unpack_from(key);
            const ckrCName = key.subarray(5, 5+namelen);

            const datatype = [null, 'dir', 'file', 'dthread', 'fthread'][val[0]];
            const datarec = val.subarray(2);

            if (datatype === 'dir') {
                const [dirFlags, dirVal, dirDirID, dirCrDat, dirMdDat, dirBkDat, dirUsrInfo, dirFndrInfo]
                = struct('>HHLLLL16s16s').unpack_from(datarec);

                const f = new MacFolder();
                cnids[dirDirID] = f;
                childlist.push([ckrParID, ckrCName, f]);

                f.crdate = dirCrDat;
                f.mddate = dirMdDat;
                f.bkdate = dirBkDat;
            } else if (datatype === 'file') {
                const [filFlags, filTyp, filUsrWds, filFlNum,
                    filStBlk, filLgLen, filPyLen,
                    filRStBlk, filRLgLen, filRPyLen,
                    filCrDat, filMdDat, filBkDat,
                    filFndrInfo, filClpSize,
                    filExtRec, filRExtRec]
                = struct('>BB16sLHLLHLLLLL16sH12s12sxxxx').unpack_from(datarec);

                const f = new MacFile();
                cnids[filFlNum] = f;
                childlist.push([ckrParID, ckrCName, f]);

                f.crdate = filCrDat;
                f.mddate = filMdDat;
                f.bkdate = filBkDat;
                [f.type, f.creator, f.flags, f.x, f.y] = struct('>4s4sHHH').unpack_from(filUsrWds);

                f.data = getfork(filLgLen, filExtRec, filFlNum, 'data');
                f.rsrc = getfork(filRLgLen, filRExtRec, filFlNum, 'rsrc');
            }
        }

        for (const [parent_cnid, child_name, child_obj] of childlist) {
            if (parent_cnid != 1) {
                const parent_obj = cnids[parent_cnid];
                if (!(parent_obj instanceof AbstractFolder)) {
                    throw new Error('Parent is not a folder');
                }
                parent_obj.setItem(child_name, child_obj);
            }
        }

        if (!(cnids[2] instanceof AbstractFolder)) {
            throw new Error('cnids[2] is not a folder');
        }
        this.update(cnids[2]);

        this.removeItem(bytes('Desktop'));
        this.removeItem(bytes('Desktop DB'));
        this.removeItem(bytes('Desktop DF'));

        // _link_aliases(drCrDate, cnids)
    }
}
