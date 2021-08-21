const TerserPlugin = require('terser-webpack-plugin');

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
