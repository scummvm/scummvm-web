import { Component, ComponentChild } from 'preact';
import Dumper from './Dumper';
import Punycoder from './Punycoder';

export type Props = {};

export type State = {};

export default class App extends Component<Props, State> {
    render(): ComponentChild {
        return <div class="app">
            <Dumper/>
            <Punycoder/>
        </div>;
    }
}
