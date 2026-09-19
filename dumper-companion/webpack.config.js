const MinimizerPlugin = require('minimizer-webpack-plugin');

module.exports = {
    context: `${__dirname}/src`,
    entry: "./index.tsx",
    output: {
        clean: true,
        path: `${__dirname}/dist`,
        filename: "dumper-companion.js",
        chunkFilename: "[name].dumper-companion.js"
    },
    resolve: {
        extensions: [".ts", ".tsx", ".js"]
    },
    module: {
        rules: [
            { test: /\.tsx?$/, loader: "ts-loader" }
        ]
    },
    plugins: [],
    optimization: {
        usedExports: true,
        minimizer: [
            new MinimizerPlugin({
                extractComments: false,
            }),
        ],
    },
};
