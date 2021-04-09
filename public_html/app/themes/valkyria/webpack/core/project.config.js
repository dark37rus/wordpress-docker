module.exports = {
  context: 'assets',
  entry: {
    app: '/'
  },
  devtool: 'cheap-module-eval-source-map',
  outputFolder: '../assets',
  publicFolder: 'assets',
  proxyTarget: 'http://myapp.local/',

  watch: [
    '../**/*.php'
  ]
}
