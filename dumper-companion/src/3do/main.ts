import type { ZipDirectoryEntry } from '@zip.js/zip.js';
import { bytesToString } from '../util';

// 3DO filesystem layout, also used by ScummVM Tools:
// https://github.com/scummvm/scummvm-tools/blob/master/engines/director/unCD-ROM.cpp
const SECTOR_SIZE = 2048;
const RAW_SECTOR_SIZE = 2352;
const LABEL_SIGNATURE = [1, 0x5A, 0x5A, 0x5A, 0x5A, 0x5A, 1];
const DIRECTORY_HEADER_SIZE = 20;
const DIRECTORY_RECORD_SIZE = 72;
const FILE_IS_DIRECTORY = 1;
const LAST_IN_DIRECTORY = 0x80000000;
const LAST_IN_BLOCK = 0x40000000;

type ImageLayout = {
    offset: number;
    sectorSize: number;
    dataOffset: number;
};

type FileEntry = {
    startBlock: number;
    blockSize: number;
    blockCount: number;
    byteCount: number;
    burst: number;
    gap: number;
};

function probe(image: Uint8Array): ImageLayout | null {
    // BIN files may include the two-second pregap before the data track.
    for (const pregap of [0, 150]) {
        for (const sectorSize of [SECTOR_SIZE, RAW_SECTOR_SIZE]) {
            const offset = pregap * sectorSize;
            const dataOffset = sectorSize === RAW_SECTOR_SIZE ? 16 : 0;
            if (dataOffset && image[offset + 15] !== 1) {
                continue;
            }
            if (LABEL_SIGNATURE.every((byte, i) => image[offset + dataOffset + i] === byte)) {
                return {offset, sectorSize, dataOffset};
            }
        }
    }
    return null;
}

// Return false for other formats so the caller can try the Macintosh reader.
export function dump3DO(image: Uint8Array, zipDir: ZipDirectoryEntry, stripPrefixes: boolean, log: (msg: string) => void): boolean {
    const layout = probe(image);
    if (!layout) {
        return false;
    }
    log('Detected a 3DO disc image. Extracting files...');

    const {offset: imageOffset, sectorSize, dataOffset} = layout;
    const imageSize = Math.floor((image.length - imageOffset) / sectorSize) * SECTOR_SIZE;
    function checkRange(offset: number, length: number): void {
        if (!Number.isSafeInteger(offset) || !Number.isSafeInteger(length) ||
            offset < 0 || length < 0 || offset + length > imageSize) {
            throw new Error('The 3DO image is truncated or contains an invalid file location.');
        }
    }

    function read(offset: number, length: number): Uint8Array {
        checkRange(offset, length);
        if (sectorSize === SECTOR_SIZE) {
            return image.subarray(imageOffset + offset, imageOffset + offset + length);
        }

        // Strip raw-sector headers and error-correction data only for the
        // requested range, without allocating a second copy of the whole disc.
        const data = new Uint8Array(length);
        let copied = 0;
        while (copied < length) {
            const sector = Math.floor(offset / SECTOR_SIZE);
            const withinSector = offset % SECTOR_SIZE;
            const count = Math.min(length - copied, SECTOR_SIZE - withinSector);
            const sectorOffset = imageOffset + sector * sectorSize;
            if (image[sectorOffset + 15] !== 1) {
                throw new Error('The 3DO BIN contains an unsupported sector. Select a MODE1 data track.');
            }
            const start = sectorOffset + dataOffset + withinSector;
            data.set(image.subarray(start, start + count), copied);
            offset += count;
            copied += count;
        }
        return data;
    }

    const labelBytes = read(0, 132);
    const label = new DataView(labelBytes.buffer, labelBytes.byteOffset, labelBytes.byteLength);
    const volumeBlockSize = label.getUint32(76);
    if (!volumeBlockSize || volumeBlockSize % SECTOR_SIZE !== 0 ||
        volumeBlockSize > imageSize || label.getUint32(96) > 7) {
        throw new Error('Invalid 3DO volume header.');
    }

    function readFile(entry: FileEntry): Uint8Array {
        if (entry.byteCount === 0) {
            return new Uint8Array();
        }
        if (!entry.blockSize || entry.blockSize % volumeBlockSize !== 0 ||
            entry.byteCount > entry.blockCount * entry.blockSize ||
            (entry.gap > 0 && entry.burst === 0)) {
            throw new Error('Invalid 3DO file block layout.');
        }
        const start = entry.startBlock * volumeBlockSize;
        if (!entry.gap) {
            return read(start, entry.byteCount);
        }

        // Interleaved files contain bursts of data separated by gap blocks.
        const burstSize = entry.burst * entry.blockSize;
        const gapSize = entry.gap * entry.blockSize;
        const gaps = Math.floor((entry.byteCount - 1) / burstSize);
        checkRange(start, entry.byteCount + gaps * gapSize);
        const data = new Uint8Array(entry.byteCount);
        for (let copied = 0, offset = start; copied < data.length; offset += burstSize + gapSize) {
            const count = Math.min(burstSize, data.length - copied);
            data.set(read(offset, count), copied);
            copied += count;
        }
        return data;
    }

    const root: FileEntry = {
        startBlock: label.getUint32(100),
        blockSize: label.getUint32(92),
        blockCount: label.getUint32(88),
        byteCount: label.getUint32(92) * label.getUint32(88),
        burst: 1,
        gap: 0,
    };
    const pending = [{entry: root, target: zipDir}];
    const visitedDirectories = new Set<number>();
    let fileCount = 0;
    while (pending.length) {
        const {entry, target} = pending.pop()!;
        if (entry.blockCount === 0) {
            continue;
        }
        if (visitedDirectories.has(entry.startBlock)) {
            throw new Error('The 3DO image contains a directory cycle.');
        }
        visitedDirectories.add(entry.startBlock);
        // Directory links are block numbers within this directory file,
        // not absolute locations on the disc.
        const data = readFile({...entry, byteCount: entry.blockCount * entry.blockSize});
        const view = new DataView(data.buffer, data.byteOffset, data.byteLength);
        const visitedBlocks = new Set<number>();
        let block = 0;
        while (block !== -1) {
            if (block < 0 || block >= entry.blockCount || visitedBlocks.has(block)) {
                throw new Error('Invalid 3DO directory block chain.');
            }
            visitedBlocks.add(block);
            const page = block * entry.blockSize;
            if (entry.blockSize < DIRECTORY_HEADER_SIZE) {
                throw new Error('Invalid 3DO directory block size.');
            }
            const nextBlock = view.getInt32(page);
            const end = view.getUint32(page + 12);
            let offset = view.getUint32(page + 16);
            if (offset < DIRECTORY_HEADER_SIZE || offset > end || end > entry.blockSize) {
                throw new Error('Invalid 3DO directory header.');
            }
            block = nextBlock;
            while (offset < end) {
                if (offset + DIRECTORY_RECORD_SIZE > end) {
                    throw new Error('Truncated 3DO directory entry.');
                }
                const record = page + offset;
                const flags = view.getUint32(record);
                const lastAvatar = view.getUint32(record + 64);
                const recordSize = DIRECTORY_RECORD_SIZE + lastAvatar * 4;
                if (offset + recordSize > end) {
                    throw new Error('Invalid 3DO file copy list.');
                }
                const rawName = data.subarray(record + 32, record + 64);
                const terminator = rawName.indexOf(0);
                const originalName = bytesToString(terminator < 0 ? rawName : rawName.subarray(0, terminator));
                const name = stripPrefixes ? originalName.replace(/^[A-Za-z][0-9]*_/, '') : originalName;
                if (!name || name === '.' || name === '..' || /[/\\]/.test(name)) {
                    throw new Error('Invalid filename in the 3DO image.');
                }
                if (stripPrefixes && target.children.some(child => child.name.toLowerCase() === name.toLowerCase())) {
                    throw new Error(`Removing 3DO prefixes produces a duplicate filename: ${name}.`);
                }
                const child: FileEntry = {
                    // Avatars are duplicate copies; extract the first one.
                    startBlock: view.getUint32(record + 68),
                    blockSize: view.getUint32(record + 12),
                    blockCount: view.getUint32(record + 20),
                    byteCount: view.getUint32(record + 16),
                    burst: view.getUint32(record + 24),
                    gap: view.getUint32(record + 28),
                };
                if (flags & FILE_IS_DIRECTORY) {
                    pending.push({entry: child, target: target.addDirectory(name)});
                } else {
                    target.addUint8Array(name, readFile(child));
                    fileCount++;
                }
                offset += recordSize;
                if (flags & LAST_IN_DIRECTORY) {
                    block = -1;
                    break;
                }
                if (flags & LAST_IN_BLOCK) {
                    break;
                }
            }
        }
    }
    log(`Extracted ${fileCount} files from the 3DO image.`);
    return true;
}
