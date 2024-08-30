const path = require('path');

module.exports = {
  mode: 'production',
  devtool: 'source-map',
  entry: [
    './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    './js/custom/main.js',
  ],
  externals: {
    jquery: 'jQuery',
  },
  output: {
    path: path.resolve(__dirname, 'js'),
    filename: 'javascript.min.js',
  },
};
