import { ComponentChild } from 'preact';
import { useState, useEffect } from 'preact/hooks';
import { fs } from '@zip.js/zip.js';
import { Volume } from './hfs/main';
import { Language, getLanguages } from './encoding';

type DumpSettings = {
    imageName: string;
    lang: Language;
    unicode: boolean;
    forceMacBinary: boolean;
    log: (msg: ComponentChild | Error) => void;
    updateDumpPercent: (dumpPercent: number) => void;
    finished: () => void;
};

async function dumpVolume(file: ArrayBuffer, s: DumpSettings): Promise<void> {
    s.log('Parsing volume...');
    try {
        const volume = new Volume();
        volume.read(new Uint8Array(file));

        s.updateDumpPercent(0);

        const zipFS = new fs.FS();
        volume.dumpToZip(zipFS.root, s.lang, !s.unicode, s.forceMacBinary, s.log);
        const blob = await zipFS.exportBlob({
            level: 0,
            onprogress: (index: number, max: number): undefined => {
                const percent = Math.floor(index / max * 100);
                s.updateDumpPercent(percent);
            }
        });
        const volumeURL = URL.createObjectURL(blob);
        s.log('Success! Next steps:');
        s.log(<span>1. <a href={volumeURL} download={`${s.imageName}.zip`}>Click here to download your game data.</a></span>);
        s.log('2. Unzip the game data.');
        s.log('3. Add the directory to ScummVM.');
    } catch (err) {
        s.log(err);
    }
    s.finished();
}

export default function Dumper() {
    type Image = {
        file: File;
        name: string;
    };

    type Progress = {
        busy: boolean;
        logs: ComponentChild[];
        lastLogWasDumpPercent: boolean;
        dumpPercent: number;
    };

    const [image, setImage] = useState<Image>({file: null, name: null});
    const [lang, setLang] = useState(Language.EN);
    const [unicode, setUnicode] = useState(true);
    const [forceMacBinary, setForceMacBinary] = useState(false);
    const [progress, setProgress] = useState<Progress>({busy: false, logs: [], lastLogWasDumpPercent: false, dumpPercent: -1});

    function log(msg: ComponentChild | Error): void {
        console.log(msg);
        if (msg instanceof Error) {
            msg = msg.toString();
        }

        setProgress((p: Progress): Progress => {
            const logs = [...p.logs, <li key={p.logs.length}>{msg}</li>];
            const lastLogWasDumpPercent = false;
            return {...p, logs, lastLogWasDumpPercent};
        });
    }

    function updateDumpPercent(dumpPercent: number): void {
        setProgress((p: Progress): Progress => {
            if (dumpPercent === p.dumpPercent) {
                return p;
            }

            const msg = `Dumping volume... ${dumpPercent}%`;
            // The function is not really pure anymore, but seen from preact that should do it
            console.log(msg);

            const logs = p.lastLogWasDumpPercent
                ? [...p.logs.slice(0, -1), <li key={p.logs.length-1}>{msg}</li>]
                : [...p.logs, <li key={p.logs.length}>{msg}</li>];
            const lastLogWasDumpPercent = true;
            return {...p, logs, lastLogWasDumpPercent, dumpPercent};
        });
    }

    function starting(): void {
        setProgress({busy: true, logs: [], lastLogWasDumpPercent: false, dumpPercent: -1});
    }

    function finished(): void {
        setProgress((p: Progress): Progress => {
            return {...p, busy:false, dumpPercent: -1};
        });
    }

    function handleImage(e: Event): void {
        const file = (e.target as HTMLInputElement).files[0];
        const name = file.name.replace(/\.\w+$/, '');
        setImage({file, name});
    }

    function handleLanguage(e: Event): void {
        const lang = (e.target as HTMLSelectElement).value as Language;
        setLang(lang);
    }

    function handleUnicode(e: Event): void {{
        const unicode = (e.target as HTMLInputElement).checked;
        setUnicode(unicode);
    }}

    function handleForceMacBinary(e: Event): void {{
        const forceMacBinary = (e.target as HTMLInputElement).checked;
        setForceMacBinary(forceMacBinary);
    }}

    function handleDump(): void {
        starting();
        log(`Loading volume "${image.name}"...`);
        const reader = new FileReader();
        reader.addEventListener('load', () => {
            dumpVolume(reader.result as ArrayBuffer, {
                imageName: image.name,
                lang,
                unicode,
                forceMacBinary,
                log,
                updateDumpPercent,
                finished
            } as DumpSettings);
        });
        reader.readAsArrayBuffer(image.file);
    }

    useEffect((): void => {
        setProgress((p: Progress): Progress => {
            const logs = [<li key={p.logs.length}>Waiting for input...</li>];
            const lastLogWasDumpPercent = false;
            return {...p, logs, lastLogWasDumpPercent};
        });
    }, []);

    const busy = progress.busy;

    return (<div class="dumper">
        <div class="in box">
            <h2>Input</h2>

            <div>
                <p>Select the game's disk image:</p>
                <input disabled={busy} class="file" type="file" accept=".dsk,.image,.img,.iso,.toast,.cdr,.diskcopy,.dcpy,.dc42" onInput={handleImage}/>
            </div>

            <div>
                <p>Select the game's language:</p>
                <select disabled={busy} value={lang} onInput={handleLanguage}>
                    {getLanguages().map((lang, i) => <option key={i} value={lang}>{lang}</option>)}
                </select>
            </div>

            <div>
                <input disabled={busy} type="checkbox" id="unicode" checked={unicode} onInput={handleUnicode}/>
                <label for="unicode">Allow Unicode file names</label>
            </div>

            <div>
                <input disabled={busy} type="checkbox" id="forceMacBinary" checked={forceMacBinary} onInput={handleForceMacBinary}/>
                <label for="forceMacBinary">Always use MacBinary encoding (use only when explicitly needed for an engine)</label>
            </div>

            <div>
                <button disabled={busy || image == null} onClick={handleDump}>Dump!</button>
            </div>
        </div>
        <div class="out box">
            <h2>Output</h2>
            <ul class="log">{progress.logs}</ul>
        </div>
    </div>);
}
