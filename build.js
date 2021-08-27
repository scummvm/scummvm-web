const sass = require('sass');
const fs = require('fs');
const autoprefixer = require('autoprefixer');
const postcss = require('postcss')

async function renderScss(filename) {
    const inFile = `./scss/${filename}.scss`;
    const outFile = `./public_html/css/${filename}.css`;

    console.log(`Converting ${inFile} to css`);
    const output = sass.renderSync({
        outputStyle: "compressed",
        file: inFile,

    });

    console.log(`Applying autoprefixer`);
    const result = await postcss([autoprefixer]).process(output.css, { from: undefined });

    console.log(`Writing to ${outFile}`);
    fs.writeFileSync(outFile, result.css);
}

renderScss('main_rtl');
renderScss('main_ltr');
renderScss('platforms');

console.log("Copying dumper companion");
fs.copyFileSync("./node_modules/dumper-companion/index.js", "./public_html/js/dumper-companion.js");
