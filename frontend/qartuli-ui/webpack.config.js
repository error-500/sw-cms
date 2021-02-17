const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
module.exports = {
  // ...
  resolve: {
    alias: {
      // If using the runtime only build
      // vue$: 'vue/dist/vue.runtime.esm.js' // 'vue/dist/vue.runtime.common.js' for webpack 1
      // Or if using full build of Vue (runtime + compiler)
      // vue$: 'vue/dist/vue.esm.js' // 'vue/dist/vue.common.js' for webpack 1
      vue$: path.resolve(__dirname, 'node_modules/vue/dist/vue.esm.js')
    }
  },
  output: {
    libraryExport: 'default',
    filename: 'js/[name].js',
    chunkFilename: 'js/app-[id].js'
  },
  module: {
    rules: [{
      test: /\.(css|scss)$/,
      use: [
        MiniCssExtractPlugin.loader,
        'sass-loader?sourceMap',
        'css-loader',
        'resolve-url-loader',
        'style-loader'
      ]
    },
    {
      test: /\.(png|jpe?g|gif)(\?.*)?$/,
      use: ['url-loader'],
      loaderOptions: {
        // limit: inlineLimit,
        name: 'img/[id].[ext]'
      }
    },
    {
      test: /\.(woff2?|eot|ttf|otf)(\?.*)?$/i,
      use: ['url-loader'],
      loaderOptions: {
        // limit: inlineLimit,
        name: 'fonts/[id].[ext]'
      }
    }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/style.css'
    })
  ]
}
