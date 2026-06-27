const MinimizerPlugin = require('minimizer-webpack-plugin');

module.exports = {
    context: `${__dirname}/src`,
    entry: "./index.tsx",
    output: {
        path: __dirname,
        filename: "index.js"
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
        minimizer: [
            new MinimizerPlugin({
                extractComments: false,
            }),
        ],
    },
};
