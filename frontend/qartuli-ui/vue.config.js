const path = require('path')
const ExtractTextPlugin = require('mini-css-extract-plugin')

module.exports = {
  publicPath: '',
    assetsDir: '', // eslint-disable-line
  /* loaders: [{
                test: /\.css$/,
                loaders: ['style-loader', 'css-loader', 'resolve-url-loader']
            }, {
                test: /\.scss$/,
                loaders: ['style-loader', 'css-loader', 'resolve-url-loader', 'sass-loader?sourceMap']
            },
            {
                test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: "url-loader?limit=10000&mimetype=application/font-woff"
            },
            {
                test: /\.(ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: "url-loader" //"file-loader"
            }
        ], */
  runtimeCompiler: true,
  css: {
    sourceMap: false,
    extract: {
      filename: '[name].css'
    },
    loaderOptions: {
      sass: {
        prependData: '@import "@/assets/scss/lib.scss";'
      }
    }
  },
  /* configureWebpack: {
            module: {
                rules: [{
                        test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                        loader: "url-loader?limit=10000&mimetype=application/font-woff"
                    },
                    {
                        test: /\.(ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                        loader: "url-loader" //"file-loader"
                    }
                ]
            }
        }, */
  chainWebpack: webpackConfig => {
    if (process.env.NODE_ENV === 'production') {
      const inlineLimit = 10000
      const assetsPath = ''
      webpackConfig.resolve.alias.set(
        'vue$',
        // If using the runtime only build
        // path.resolve(__dirname, 'node_modules/vue/dist/vue.runtime.esm.js')
        // Or if using full build of Vue (runtime + compiler)
        path.resolve(__dirname, 'node_modules/vue/dist/vue.esm.js')
      )
      /* webpackConfig
                                  .output
                                  .filename(path.join(assetsPath, 'js/[name].[chunkhash:8].js'))
                                  .chunkFilename(path.join(assetsPath, '/js/chunk[id].[chunkhash:8].js'))
                                  */
      webpackConfig
        .output
        .libraryExport = 'default'
      /* webpackConfig
                                    .resolve
                                    .alias
                                    .vue$ = 'vue/dist/vue.esm.js'; */
      webpackConfig.plugin('extract-css')
        .use(ExtractTextPlugin, [{
          filename: path.join(assetsPath, 'css/[name].css'),
          allChunks: true
        }])

      webpackConfig.module
        .rule('images')
        .test(/\.(png|jpe?g|gif)(\?.*)?$/)
        .use('url-loader')
        .loader('url-loader')
        .options({
          limit: inlineLimit,
          name: path.join(assetsPath, 'img/[name].[ext]')
        })

      webpackConfig.module
        .rule('fonts')
        .test(/\.(woff2?|eot|ttf|otf)(\?.*)?$/i)
        .use('url-loader')
        .loader('url-loader')
        .options({
          limit: inlineLimit,
          name: path.join(assetsPath, 'fonts/[name].[ext]')
        })
    }
  }
}
