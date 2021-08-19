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
 * https://github.com/elliotnunn/machfs/blob/master/machfs/btree.py
 */


import struct from '../struct';


export function unpack_extent_record(record: Uint8Array): [number, number][] {
    /* Extract up to three (first_block, block_count) tuples from a 12-byte extent record */
    const [a, b, c, d, e, f] = struct('>6H').unpack(record);
    const l = [];
    if (b) l.push([a, b]);
    if (d) l.push([c, d]);
    if (f) l.push([e, f]);
    return l;
}


function _unpack_btree_node(buf: Uint8Array, start: number): [number, number, number, number, Uint8Array[]] {
    /* Slice a btree node into records, including the 14-byte node descriptor */
    const [ndFLink, ndBLink, ndType, ndNHeight, ndNRecs] = struct('>LLBBH').unpack_from(buf, start);
    const offsets = struct(`>${ndNRecs+1}H`).unpack_from(buf, start+512-2*(ndNRecs+1)).reverse();
    const records: Uint8Array[] = [];
    for (let i = 0; i < offsets.length - 1; i++) {
        const i_start = offsets[i];
        const i_stop = offsets[i + 1];
        records.push(buf.subarray(start+i_start, start+i_stop));
    }
    return [ndFLink, ndBLink, ndType, ndNHeight, records];
}


export function dump_btree(buf: Uint8Array): Uint8Array[] {
    /* Walk an HFS B*-tree, returning an array of (key, value) tuples. */

    // Get the header node
    const [ndFLink, ndBLink, ndType, ndNHeight, records] = _unpack_btree_node(buf, 0);
    const [header_rec, unused_rec, map_rec] = records;

    // Ask about the header record in the header node
    const [bthDepth, bthRoot, bthNRecs, bthFNode, bthLNode, bthNodeSize, bthKeyLen, bthNNodes, bthFree]
    = struct('>HLLLLHHLL').unpack_from(header_rec);
    // print('btree', bthDepth, bthRoot, bthNRecs, bthFNode, bthLNode, bthNodeSize, bthKeyLen, bthNNodes, bthFree)

    // And iterate through the linked list of leaf nodes
    const res: Uint8Array[] = [];
    let this_leaf = bthFNode;
    while (true) {
        const [ndFLink, ndBLink, ndType, ndNHeight, records] = _unpack_btree_node(buf, 512*this_leaf);

        for (const record of records) {
            res.push(record);
        }

        if (this_leaf === bthLNode)
            break;
        this_leaf = ndFLink;
    }

    return res;
}
