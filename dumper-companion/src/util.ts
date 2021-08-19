export function charCode(charStr: string): number {
    return charStr.charCodeAt(0);
}

const encoder = new TextEncoder();
export function bytes(str: string | number[]): Uint8Array {
    return Array.isArray(str)
        ? Uint8Array.from(str)
        : encoder.encode(str);
}

export function add(numbers: number[]): number {
    return numbers.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
}

export function joinBytes(bufs: Uint8Array[]): Uint8Array {
    const length = add(bufs.map(buf => buf.length));
    const res = new Uint8Array(length);
    let pos = 0;
    for (const buf of bufs) {
        res.set(buf, pos);
        pos += buf.byteLength;
    }
    return res;
}

export function bytesToString(buf: Uint8Array): string {
    return String.fromCharCode(...buf);
}

const macRomanDecoder = new TextDecoder('macintosh');
export function decodeMacRoman(buf: Uint8Array): string {
    return macRomanDecoder.decode(buf);
}
