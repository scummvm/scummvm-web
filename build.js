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
    fs.copyFileSync("./dumper-companion/index.js", "./public_html/js/dumper-companion.js");
    fs.copyFileSync("./dumper-companion/style.css", "./public_html/css/dumper-companion.css");
}

async function build() {
    await renderScss('main_rtl');
    await renderScss('main_ltr');
    await renderScss('platforms');
    copyDumper();
}

build();
