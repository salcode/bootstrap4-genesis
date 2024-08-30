const path = require('path');

module.exports = {
  mode: 'production',
  entry: './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
  externals: {
    jquery: 'jQuery',
  },
  output: {
    path: path.resolve(__dirname, 'js'),
    filename: 'javascript.min.js',
  },
};
