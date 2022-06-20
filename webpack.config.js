module.exports = {
  // メインとなるJavaScriptファイル（エントリーポイント）
  entry: {
    index: `./_src/js/index.js`
    // main: `./_src/js/main.js`,
    // router: `./_src/js/router.js`
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: "babel-loader"
      }
    ]
  },

  mode: "production", //development

  // ファイルの出力設定
  output: {
    path: `${__dirname}/_public/assets/js`,
    filename: "[name].js"
  }
};
