let path = require('path');
let HtmlWebPackPlugin = require('html-webpack-plugin');
let MiniCssExtractPlugin = require('mini-css-extract-plugin');

let config = {
  entry: './src/app/main.js',
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: './app/main.js',
    publicPath: '/'
  },
  devServer: {
    overlay: true
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            'presets': [
              'env',
              'es2015',
              'stage-2'
            ]
          }
        }
      },
      {
        test: /\.(scss|sass)$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].css'
            }
          },
          {
            loader: 'extract-loader'
          },
          {
            loader: 'css-loader'
          },
          {
            loader: 'postcss-loader'
          },
          {
            loader: 'sass-loader'
          }
        ]
      },
      {
        test: /\.html$/,
        use: [
          {
            loader: 'html-loader',
            options: {minimize: true}
          }
        ]
      },
      {
        test: /\.styl$/,
        loader: 'style!css!autoprefixer?browsers=last 2 versions!stylus?resolve url'
      },
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader']
      }
    ]
  },
  plugins: [
    new HtmlWebPackPlugin(),
    new MiniCssExtractPlugin({
      filename: '[name].css',
      chunkFilename: '[id].css'
    })
  ]
};

module.exports = config;

