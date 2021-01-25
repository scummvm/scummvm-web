const sass = require('sass');
const fs = require('fs');
const autoprefixer = require('autoprefixer');

async function renderScss(filename) {
    const inFile = `./scss/${filename}.scss`;
    const outFile = `./public_html/css/${filename}.css`;

    console.log(`Converting ${inFile} to css`);
    const output = sass.renderSync({
        outputStyle: "compressed",
        file: inFile,

    });

    console.log(`Applying autoprefixer`);
    const result = await autoprefixer.process(output.css, { from: undefined });

    console.log(`Writing to ${outFile}`);
    fs.writeFileSync(outFile, result.css);
}

renderScss('main_rtl');
renderScss('main_ltr');
renderScss('platforms');
