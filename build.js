const sass = require('sass');
const fs = require('fs');
const autoprefixer = require('autoprefixer');
const postcss = require('postcss')

async function renderScss(filename) {
    const inFile = `./scss/${filename}.scss`;
    const outFile = `./public_html/css/${filename}.css`;

    console.log(`Converting ${inFile} to css`);
    const output = sass.compile(inFile, {
        loadPaths: ['./scss/'],
        style: "compressed",
    });

    console.log(`Applying autoprefixer`);
    const result = await postcss([autoprefixer]).process(output.css, { from: undefined });

    console.log(`Writing to ${outFile}`);
    fs.writeFileSync(outFile, result.css);
}

function copyDumper() {
    console.log("Copying dumper companion");
    const srcFiles = fs.readdirSync("./dumper-companion/dist/", { withFileTypes: true });
    const copiedFiles = new Set();
    for (const srcFile of srcFiles) {
        const src = `./dumper-companion/dist/${srcFile.name}`;
        const dest = `./public_html/js/${srcFile.name}`;

        // ignore folders
        if (srcFile.isDirectory()) {
            continue;
        }
        // make sure we don't copy something not properly prefixed
        if (!/^(.+\.)?dumper-companion\.js$/.test(srcFile.name)) {
            continue;
        }
        fs.copyFileSync(src, dest);
        copiedFiles.add(srcFile.name);
    }
    // Cleanup
    const destFiles = fs.readdirSync("./public_html/js/", { withFileTypes: true });
    for (const destFile of destFiles) {
        const dest = `./public_html/js/${destFile.name}`;

        // ignore folders
        if (destFile.isDirectory()) {
            continue;
        }
        // check every dumper-companion JS files
        if (!/^(.+\.)?dumper-companion\.js$/.test(destFile.name)) {
            continue;
        }
        if (copiedFiles.has(destFile.name)) {
            continue;
        }
        console.log(`Cleaning up obsolete file: ${dest}`);
        fs.unlinkSync(dest);
    }
    fs.copyFileSync("./dumper-companion/style.css", "./public_html/css/dumper-companion.css");
}

async function build() {
    await renderScss('main_rtl');
    await renderScss('main_ltr');
    await renderScss('platforms');
    copyDumper();
}

build();
