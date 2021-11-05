import { Component, ComponentChild } from 'preact';
import * as punycode from 'punycode/';
import { escapeString, unescapeString } from './encoding';

export type Props = {};

export type State = {
    text: string;
};

export default class Punycoder extends Component<Props, State> {
    constructor() {
        super();
        this.state = {
            text: ''
        };
    }

    render(): ComponentChild {
        return <div class="punycoder box">
            <h2>Punycoder</h2>
            <p>
                For platforms that don't support Unicode file names, ScummVM uses
                a variant of <a href="https://en.wikipedia.org/wiki/Punycode">Punycode</a>.
                You can use this to manually encode/decode file names:
            </p>
            <div>
                <input type="text" placeholder="File name" value={this.state.text} onInput={this.handleText.bind(this)}></input>
                <button onClick={this.encode.bind(this)}>Encode</button>
                <button onClick={this.decode.bind(this)}>Decode</button>
            </div>
        </div>;
    }

    handleText(e: Event): void {
        const text = (e.target as HTMLInputElement).value;
        this.setState(() => ({ text }));
    }

    encode(): void {
        this.setState({
            text: 'xn--' + punycode.encode(escapeString(this.state.text))
        });
    }

    decode(): void {
        if (!this.state.text.startsWith("xn--")) {
            this.invalidPunycode();
            return;
        }

        const input = this.state.text.slice(4);
        try {
            this.setState({
                text: unescapeString(punycode.decode(input))
            });
        } catch (e) {
            this.invalidPunycode();
        }
    }

    invalidPunycode(): void {
        this.setState({
            text: 'Invalid Punycode!'
        });
    }
}
