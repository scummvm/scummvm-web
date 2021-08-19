const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const TerserPlugin = require('terser-webpack-plugin');

const profile = process.argv.indexOf('--profile') !== -1;

module.exports = {
  context: __dirname + "/src",
  entry: "./app.tsx",
  output: {
    path: __dirname + "/dist",
    filename: "dumper_companion.bundle.js"
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
      new TerserPlugin({
        extractComments: false,
      }),
    ],
  },
};

if (profile) {
  module.exports.plugins.push(new BundleAnalyzerPlugin());
}
