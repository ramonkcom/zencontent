const path = require('path');

module.exports = {
  entry: './src/js/main.ts',
  output: {
    filename: 'script.js',
    path: path.resolve(__dirname, 'assets/js'),
  },
  module: {
    rules: [
      {
        test: /\.ts$/,
        use: 'ts-loader',
        exclude: /node_modules/,
      },
    ],
  },
  resolve: {
    extensions: ['.ts', '.js'],
  },
};