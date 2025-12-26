export type StructValue = number | boolean | Uint8Array;

export default function struct<T extends StructValue[],>(format: string): Readonly<{
    pack: (...values: StructValue[]) => Uint8Array;
    pack_into: (arrb: Uint8Array, offs: number, ...values: T) => void;
    iter_unpack: (arrb: Uint8Array) => Generator<T, void, void>;
    unpack: (arr: Uint8Array) => T;
    unpack_from: (arr: Uint8Array, offs?: number) => T;
    format: string;
    size: number;
}>;
