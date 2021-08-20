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
 * https://github.com/elliotnunn/machfs/blob/master/machfs/directory.py
 */


import * as JSZip from 'jszip';
import { computeCRC } from '../crc';
import { Language, punycodeFileName } from '../encoding';
import struct from '../struct';
import { bytes, bytesToString, joinBytes } from '../util';


export type FileOrFolder = MacFile | AbstractFolder;


export class AbstractFolder {
    _namedict: {[key: string]: Uint8Array};
    _maindict: {[name: string]: FileOrFolder};

    constructor() {
        this._namedict = {}; // key string to raw name
        this._maindict = {}; // key string to contents
    }

    update(folder: AbstractFolder): void {
        this._namedict = folder._namedict;
        this._maindict = folder._maindict;
    }

    setItem(key: Uint8Array, value: FileOrFolder): void {
        // We need to convert the raw name bytes into a string so it can be used as an object key.
        // This string is not proper UTF-16, so it shouldn't be used anywhere but internally!
        const keyString = bytesToString(key);
        this._namedict[keyString] = key;
        this._maindict[keyString] = value;
    }

    getItem(key: Uint8Array): FileOrFolder {
        return this._maindict[bytesToString(key)];
    }

    removeItem(key: Uint8Array): void {
        const keyString = bytesToString(key);
        delete this._namedict[keyString];
        delete this._maindict[keyString];
    }

    items(): [name: Uint8Array, child: FileOrFolder][] {
        return Object.keys(this._maindict).map(key => [this._namedict[key], this._maindict[key]]);
    }

    iter_paths(): [name: Uint8Array[], child: FileOrFolder][]  {
        const res: [name: Uint8Array[], child: FileOrFolder][] = [];
        for (const [name, child] of this.items()) {
            res.push([[name], child]);
            if (child instanceof AbstractFolder) {
                for (const [each_path, each_child] of child.iter_paths()) {
                    res.push([[].concat(name, each_path), each_child]);
                }
            }
        }
        return res;
    }

    dumpToZip(zip: JSZip, lang: Language): void {
        for (const [name, child] of this.items()) {
            const punycodedName = punycodeFileName(name, lang);
            if (child instanceof AbstractFolder) {
                child.dumpToZip(zip.folder(punycodedName), lang);
            } else {
                zip.file(punycodedName, child.toMacBinary(name));
            }
        }
    }
}


export class MacFolder extends AbstractFolder {
    flags: number;
    x: number;
    y: number;

    crdate: number;
    mddate: number;
    bkdate: number;

    constructor() {
        super();

        this.flags = 0; // help me!
        this.x = 0; // where to put this spatially?
        this.y = 0;

        this.crdate = this.mddate = this.bkdate = 0;
    }
}


export class MacFile {
    type: Uint8Array;
    creator: Uint8Array;
    flags: number;
    x: number;
    y: number;

    locked: boolean;
    crdate: number;
    mddate: number;
    bkdate: number;

    aliastarget: FileOrFolder;

    rsrc: Uint8Array;
    data: Uint8Array;

    constructor() {
        this.type = bytes('????');
        this.creator = bytes('????');
        this.flags = 0; // help me!
        this.x = 0; // where to put this spatially?
        this.y = 0;

        this.locked = false;
        this.crdate = this.mddate = this.bkdate = 0;

        this.aliastarget = null;

        this.rsrc = new Uint8Array();
        this.data = new Uint8Array();
    }

    toMacBinary(name: Uint8Array): Uint8Array {
        const res: Uint8Array[] = [];

        const oldFlags = this.flags >> 8;
        const newFlags = this.flags & 8;
        const header = struct(">xB63s4s4sBxHHHBxIIIIHB14xIHBB").pack(
            name.length,
            name,
            this.type,
            this.creator,
            oldFlags,
            0,
            0,
            0,
            this.locked,
            this.data.length,
            this.rsrc.length,
            this.crdate, // TODO: dates are wrong, investigate
            this.mddate, // TODO: dates are wrong, investigate
            0,
            newFlags,
            0,
            0,
            129,
            129
        );
        res.push(header);

        res.push(struct(">H2x").pack(computeCRC(header)));

        if (this.data) {
            res.push(this.data);
            if (this.data.length % 128) {
                res.push(new Uint8Array(128 - this.data.length % 128));
            }
        }

        if (this.rsrc) {
            res.push(this.rsrc);
            if (this.rsrc.length % 128) {
                res.push(new Uint8Array(128 - this.rsrc.length % 128));
            }
        }

        return joinBytes(res);
    }
}
