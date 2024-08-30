const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const webpack = require('webpack');

module.exports = {
  mode: 'production',
  devtool: 'source-map',
  entry: [
    './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    './js/custom/main.js',
    './sass/custom.scss',
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
    new webpack.BannerPlugin({
      banner: getCssCommentBanner,
      test: /\.css$/i,
    }),
  ],
  module: {
    rules: [
      {
        test: /\.scss$/i,
        use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
      },
    ],
  },
};

function getCssCommentBanner() {
  var packageJson = require('./package');
  var {
    config: {
      theme
    },
  } = packageJson;
  return `Theme Namez: ${theme.name}
Theme URI: ${theme.uri}
Author: ${theme.author}
Author URI: ${theme.authoruri}
Description: ${packageJson.description}
Version: ${packageJson.version}
License: ${theme.license}
License URI: ${theme.licenseuri}
Text Domain: ${theme.textdomain}
Tags: ${theme.tags}
Domain Path: ${theme.domainpath}
Template: ${theme.template}
Notes: ${theme.notes}`;
}
