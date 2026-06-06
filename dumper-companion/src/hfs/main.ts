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
import { joinBytes, bytes, bytesToString } from '../util';
import struct from '../struct';


function _get_every_extent(nblocks: number, firstrecord: Uint8Array, cnid: number, xoflow: {[key: string]: Uint8Array}, fork: string): [number, number][] {
    let accum = 0;
    const extlist: [number, number][] = [];

    for (const [a, b] of btree.unpack_extent_record(firstrecord)) {
        if (!b) continue;
        accum += b;
        extlist.push([a, b]);
    }

    while (accum < nblocks) {
        const nextrecord = xoflow[`${cnid},${fork},${accum}`];
        for (const [a, b] of btree.unpack_extent_record(nextrecord)) {
            if (!b) continue;
            accum += b;
            extlist.push([a, b]);
        }
    }

    return extlist;
}


export class Volume extends AbstractFolder {
    name: string;

    constructor() {
        super();

        this.name = 'Untitled';
    }

    probePartition(from_volume: Uint8Array): Uint8Array|null {
        // Search for partition first
        for (let partition_num = 1; ; partition_num++) {
            // Apple Partition Map
            if (from_volume.length < partition_num*512+1 || from_volume[partition_num*512] != 0x50 || from_volume[partition_num*512+1] != 0x4D) { // Searching PM
                break;
            }

            const [num_partitions, partition_start, partition_size] = struct<[number, number, number]>('>III').unpack_from(from_volume.subarray(partition_num*512+4, partition_num*512+16));
            const partition_type = bytesToString(from_volume.subarray(partition_num*512+48, partition_num*512+80));
            if (partition_type.startsWith("Apple_HFS\x00")) {
                // First HFS partition: take it
                return from_volume.subarray(partition_start*512, (partition_start+partition_size)*512);
            }

            if (partition_num >= num_partitions) {
                break;
            }
        }

        // No partition
        return null;
    }

    probeStart(from_volume: Uint8Array): Uint8Array|null {
        for (let i = 0; i + 1024 + 1 < from_volume.length; i += 512) {
            if (from_volume[i+1024] === 0x42 && from_volume[i+1024+1] === 0x44) { // Searching BD
                if (i == 0) {
                    return from_volume;
                }
                return from_volume.subarray(i);
            }
        }

        return null;
    }

    probe(from_volume: Uint8Array): Uint8Array|null {
        // Image data starts at 0x54 in DiskCopy 4.2 format https://wiki.68kmla.org/DiskCopy_4.2_format_specification
        // 0x52-0x53 bytes have 01 00 value
        const maybeDC42 = from_volume.length >= 0x54 && from_volume[0x52] == 0x01 && from_volume[0x53] == 0x00;

        if (maybeDC42) {
            const dc42 = from_volume.subarray(0x54);

            // Try to find a partition first with DC42 offset
            const partitioned = this.probePartition(dc42);
            if (partitioned !== null) {
                return this.probeStart(partitioned);
            }
            // Try looking for start using DC42 offset then
            const start = this.probeStart(dc42);
            if (start !== null) {
                return start;
            }

            // If it failed, follow on with RAW images
        }

        const partitioned = this.probePartition(from_volume);
        if (partitioned !== null) {
            return this.probeStart(partitioned);
        }

        return this.probeStart(from_volume);
    }

    read(from_volume: Uint8Array): void {
        const volume = this.probe(from_volume);
        if (volume === null) {
            throw new Error('Magic number not found in image');
        }

        /* eslint-disable @typescript-eslint/no-unused-vars */
        const [drSigWord, drCrDate, drLsMod, drAtrb, drNmFls,
            drVBMSt, drAllocPtr, drNmAlBlks, drAlBlkSiz, drClpSiz, drAlBlSt,
            drNxtCNID, drFreeBks, drVN, drVolBkUp, drVSeqNum,
            drWrCnt, drXTClpSiz, drCTClpSiz, drNmRtDirs, drFilCnt, drDirCnt,
            drFndrInfo, drVCSize, drVBMCSize, drCtlCSize,
            drXTFlSize, drXTExtRec,
            drCTFlSize, drCTExtRec]
            = struct<[Uint8Array, number, number, number, number,
                number, number, number, number, number, number,
                number, number, Uint8Array, number, number,
                number, number, number, number, number, number,
                Uint8Array, number, number, number,
                number, Uint8Array,
                number, Uint8Array]>('>2sLLHHHHHLLHLH28pLHLLLHLL32sHHHL12sL12s').unpack_from(volume, 1024);
        /* eslint-enable @typescript-eslint/no-unused-vars */

        this.crdate = drCrDate;
        this.mddate = drLsMod;
        this.bkdate = drVolBkUp;

        const block2offset = (block: number) => 512*drAlBlSt + drAlBlkSiz*block;
        const getextents = (extents: [number, number][]) => joinBytes(
            extents.map(
                ([firstblk, blkcnt]: [number, number]) => volume.subarray(
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
            if (rec[0] !== 7) continue;
            const [xkrFkType, xkrFNum, xkrFABN, extrec] = struct<[number, number, number, Uint8Array]>('>xBLH12s').unpack_from(rec);
            let fork: string;
            if (xkrFkType === 0xFF)
                fork = 'rsrc';
            else if (xkrFkType === 0)
                fork = 'data';
            else
                throw new Error("Invalid fork type");
            extoflow[`${xkrFNum},${fork},${xkrFABN}`] = extrec;
        }

        const cnids: {[id: number]: FileOrFolder} = {};
        const childlist: [number, Uint8Array, FileOrFolder][] = []; // list of [parent_cnid, child_name, child_object] tuples

        for (const rec of btree.dump_btree(getfork(drCTFlSize, drCTExtRec, 4, 'data'))) {
            // create a directory tree from the catalog file
            const rec_len = rec[0];
            if (rec_len === 0) continue;

            const key = rec.subarray(2, 1+rec_len);
            const val = rec.subarray(bitmanip.pad_up(1+rec_len, 2));

            const [ckrParID, namelen] = struct<[number, number]>('>LB').unpack_from(key);
            const ckrCName = key.subarray(5, 5+namelen);

            const datatype = [null, 'dir', 'file', 'dthread', 'fthread'][val[0]];
            const datarec = val.subarray(2);

            if (datatype === 'dir') {
                /* eslint-disable @typescript-eslint/no-unused-vars */
                const [dirFlags, dirVal, dirDirID, dirCrDat, dirMdDat, dirBkDat, dirUsrInfo, dirFndrInfo]
                    = struct<[number, number, number, number, number, number, Uint8Array, Uint8Array]>('>HHLLLL16s16s').unpack_from(datarec);
                /* eslint-enable @typescript-eslint/no-unused-vars */

                const f = new MacFolder();
                cnids[dirDirID] = f;
                childlist.push([ckrParID, ckrCName, f]);

                f.crdate = dirCrDat;
                f.mddate = dirMdDat;
                f.bkdate = dirBkDat;
            } else if (datatype === 'file') {
                /* eslint-disable @typescript-eslint/no-unused-vars */
                const [filFlags, filTyp, filUsrWds, filFlNum,
                    filStBlk, filLgLen, filPyLen,
                    filRStBlk, filRLgLen, filRPyLen,
                    filCrDat, filMdDat, filBkDat,
                    filFndrInfo, filClpSize,
                    filExtRec, filRExtRec]
                    = struct<[number, number, Uint8Array, number,
                        number, number, number,
                        number, number, number,
                        number, number, number,
                        Uint8Array, number,
                        Uint8Array, Uint8Array]>('>BB16sLHLLHLLLLL16sH12s12sxxxx').unpack_from(datarec);
                /* eslint-enable @typescript-eslint/no-unused-vars */

                const f = new MacFile();
                cnids[filFlNum] = f;
                childlist.push([ckrParID, ckrCName, f]);

                f.crdate = filCrDat;
                f.mddate = filMdDat;
                f.bkdate = filBkDat;
                [f.type, f.creator, f.flags, f.x, f.y] = struct<[Uint8Array, Uint8Array, number, number, number]>('>4s4sHHH').unpack_from(filUsrWds);

                f.data = getfork(filLgLen, filExtRec, filFlNum, 'data');
                f.rsrc = getfork(filRLgLen, filRExtRec, filFlNum, 'rsrc');
            }
        }

        for (const [parent_cnid, child_name, child_obj] of childlist) {
            if (parent_cnid !== 1) {
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
