import { useState } from 'preact/hooks';
import * as punycode from 'punycode';
import { escapeString, unescapeString } from './encoding';

export default function Punycoder() {
    const [text, setText] = useState('');

    function handleText(e: Event): void {
        const newText = (e.target as HTMLInputElement).value;
        setText(newText);
    }

    function invalidPunycode(): void {
        setText('Invalid Punycode!');
    }

    function encode(): void {
        setText(`xn--${punycode.encode(escapeString(text))}`);
    }

    function decode(): void {
        if (!text.startsWith("xn--")) {
            invalidPunycode();
            return;
        }

        const input = text.slice(4);
        try {
            setText(unescapeString(punycode.decode(input)));
        } catch /*(e)*/ {
            invalidPunycode();
        }
    }

    return (<div class="punycoder box">
        <h2>Punycoder</h2>
        <p>
            For platforms that don't support Unicode file names, ScummVM uses
            a variant of <a href="https://en.wikipedia.org/wiki/Punycode">Punycode</a>.
            You can use this to manually encode/decode file names:
        </p>
        <div>
            <input type="text" placeholder="File name" value={text} onInput={handleText}/>
            <button onClick={encode}>Encode</button>
            <button onClick={decode}>Decode</button>
        </div>
    </div>);
}
