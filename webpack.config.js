const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  mode: 'production',
  devtool: 'source-map',
  entry: [
    './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    './js/custom/main.js',
    './sass/example.css',
  ],
  externals: {
    jquery: 'jQuery',
  },
  output: {
    path: path.resolve(__dirname, 'js'),
    filename: 'javascript.min.js',
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "../style.css",
    }),
  ],
  module: {
    rules: [
      {
        test: /\.css$/i,
        use: [MiniCssExtractPlugin.loader, "css-loader"],
      },
    ],
  },
};
