# Dumper Companion

Old Macintosh CD-ROMs use [https://en.wikipedia.org/wiki/Hierarchical_File_System](HFS),
a format that modern operating systems can't natively handle.

This companion program extracts game data from an HFS disk image and formats it for use in ScummVM.

This repository contains code ported/adapted from:
- https://github.com/scummvm/scummvm/blob/master/devtools/dumper-companion.py
- https://github.com/elliotnunn/machfs/
- https://github.com/lyngklip/structjs

## How to Build

1. `npm install`
2. `npm run build`

The app will be generated in the `dist` directory. These files be placed on a static web server.
