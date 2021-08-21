import { Component, ComponentChild } from 'preact';
import { fs } from '@zip.js/zip.js/lib/zip-fs.js';
import { Volume } from './hfs/main';
import { Language, getLanguages } from './encoding';

export type Props = {}

export type State = {
    image: File;
    imageName: string;
    lang: Language;
    busy: boolean;
    unicode: boolean;
    logs: ComponentChild[];
}

export default class DumperCompanionApp extends Component<Props, State> {
    constructor() {
        super();
        this.state = {
            image: null,
            imageName: null,
            lang: Language.EN,
            unicode: true,
            busy: false,
            logs: []
        };
    }

    componentDidMount(): void {
        this.log('Waiting for input...');
    }

    render(): ComponentChild {
        return <div class="io">
            <div class="in box">
                <h2>Input</h2>

                <div>
                    <p>Select the game's disk image:</p>
                    <input disabled={this.state.busy} class="file" type="file" accept=".dsk,.image,.img,.iso,.toast" onInput={this.handleImage.bind(this)}/>
                </div>

                <div>
                    <p>Select the game's language:</p>
                    <select disabled={this.state.busy} value={this.state.lang as string} onInput={this.handleLanguage.bind(this)}>
                        {getLanguages().map(lang => <option value={lang}>{lang}</option>)}
                    </select>
                </div>

                <div>
                    <input disabled={this.state.busy} type="checkbox" name="punycode" checked={this.state.unicode} onInput={this.handleUnicode.bind(this)}></input>
                    <label for="unicode">Allow Unicode file names</label>
                </div>

                <div>
                    <button disabled={this.state.busy || this.state.image == null} onClick={this.handleDump.bind(this)}>Dump!</button>
                </div>
            </div>
            <div class="out box">
                <h2>Output</h2>
                <ul class="log">{this.state.logs}</ul>
            </div>
        </div>;
    }

    log(msg: ComponentChild | Error, callback?: () => void): void {
        console.log(msg);
        if (msg instanceof Error) {
            msg = msg.toString();
        }
        this.setState(({ logs }) => ({ logs: [...logs, <li>{msg}</li>] }), callback);
    }

    replaceLastLog(msg: ComponentChild | Error, callback?: () => void): void {
        console.log(msg);
        if (msg instanceof Error) {
            msg = msg.toString();
        }
        this.setState(({ logs }) => ({ logs: [...logs.slice(0, -1), <li>{msg}</li>] }), callback);
    }

    handleImage(e: Event): void {
        const image = (e.target as HTMLInputElement).files[0];
        const imageName = image.name.replace(/\.\w+$/, '');
        this.setState(() => ({ image, imageName }));
    }

    handleLanguage(e: Event): void {
        const lang = (e.target as HTMLSelectElement).value as Language;
        this.setState(() => ({ lang }));
    }

    handleUnicode(e: Event): void {{
        const unicode = (e.target as HTMLInputElement).checked;
        this.setState(() => ({ unicode }));
    }}

    handleDump(): void {
        this.log(`Loading volume "${this.state.imageName}"...`);
        this.setState(() => ({ busy: true }), () => {
            const reader = new FileReader();
            reader.addEventListener('load', () => {
                this.parseVolume(reader.result as ArrayBuffer);
            });
            reader.readAsArrayBuffer(this.state.image);
        });
    }

    parseVolume(file: ArrayBuffer): void {
        this.log('Parsing volume...', () => {
            try {
                const volume = new Volume();
                volume.read(new Uint8Array(file));
                this.dumpVolume(volume);
            } catch (err) {
                this.log(err);
                this.setState(() => ({ busy: false }));
            }
        });
    }

    dumpVolume(volume: Volume): void {
        this.log('Dumping volume... 0%', async () => {
            try {
                const zipFS = new fs.FS();
                volume.dumpToZip(zipFS.root, this.state.lang, !this.state.unicode);
                const blob = await zipFS.exportBlob({
                    level: 0,
                    onprogress: (index, max) => {
                        const percent = Math.floor(index / max * 100);
                        this.replaceLastLog(`Dumping volume... ${percent}%`);
                    }
                });
                const volumeURL = URL.createObjectURL(blob);
                this.log('Success! Next steps:');
                this.log(<span>1. <a href={volumeURL} download={this.state.imageName + '.zip'}>Click here to download your game data.</a></span>);
                this.log('2. Unzip the game data.');
                this.log('3. Add the directory to ScummVM.');
            } catch (err) {
                this.log(err);
            }
            this.setState(() => ({ busy: false }));
        });
    }
}
