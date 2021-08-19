import { h, Component, ComponentChild } from 'preact';
import { Volume } from './hfs/main';
import { decodeMacRoman } from './util';

export interface State {
    logs: ComponentChild[];
}

export default class DumperCompanionApp extends Component<any, State> {
    constructor() {
        super();
        this.state = {
            logs: [],
        };
    }

    componentDidMount() {
        this.log('Waiting for input...');
    }

    render() {
        return <div class="io">
            <div class="in box">
                <h1>Input</h1>
                <p>Load an ISO from a file:</p>
                <input class="file" type="file" onInput={this.handleFile.bind(this)}/>
            </div>
            <div class="out box">
                <h1>Output</h1>
                <ul class="log">{this.state.logs}</ul>
            </div>
        </div>;
    }

    log(msg: ComponentChild | Error) {
        console.log(msg);
        if (msg instanceof Error) {
            msg = msg.toString();
        }
        this.setState(({ logs }) => ({ logs: [...logs, <li>{msg}</li>] }));
    }

    handleFile(e) {
        const file = e.target.files[0];
        const volumeName = file.name.replace(/\.\w+$/, '');
        const reader = new FileReader();
        reader.addEventListener('load', () => {
            const volume = this.readVolume(volumeName, reader.result as ArrayBuffer);
            if (volume) {
                this.writeVolume(volumeName, volume);
            }
        });
        reader.readAsArrayBuffer(file);
    }

    readVolume(volumeName: string, file: ArrayBuffer): Volume {
        this.log(`Reading volume "${volumeName}"`);
        const volume = new Volume();
        try {
            volume.read(new Uint8Array(file));
        } catch (err) {
            this.log(err);
            return null;
        }
        return volume;
    }

    writeVolume(volumeName: string, volume: Volume) {
        this.log('ISO contents:')
        // this.log('Writing ZIP file');
        for (const [path, obj] of volume.iter_paths()) {
            this.log(path.map(part => decodeMacRoman(part)).join(':'));
        }
        // try {
        //     const volumeZIP = null; // TODO
        //     const volumeURL = URL.createObjectURL(new Blob([volumeZIP], {type: 'application/zip'}));
        //     this.log(
        //         <span>
        //             Success! <a href={volumeURL} download={volumeName + '.zip'}>Click here to download your dumped volume.</a>
        //         </span>
        //     );
        // } catch (err) {
        //     this.log(err);
        // }
    }
}
