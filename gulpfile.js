/*
 *
 * DELAUNAY gulpfile
 * ver.20220603
 *
 */
const {
  src,
  dest,
  watch,
  series,
  parallel
} = require('gulp');
const gulp = require("gulp");
const config = require("./setting.json");


// 共通
const notify = require('gulp-notify');
const changed = require('gulp-changed');
const gulpIf = require("gulp-if");

const paths = {
  'src': './_src',
  'pb': './_public' + config.rootPath,
  'pbwp': './_public_wp/themes',
  'css_watch': "/scss/**/*.scss",
  'css_folder': "/assets/css",
  'js_watch': "/js/**/*.js",
  'js_folder': "/assets/js",
  "wp_watch": "/wp/**/*",
  "html_watch": "/html/**/*.php",
  "html_folder": "",
  "file_watch": "/files/**/*",
  "file_folder": "/assets/files",
  "inc_watch": "/html/_inc/**/*.php",
  "inc_folder": "/assets/inc",
  "img_watch": "/img/**/*.+(jpg|jpeg|png|gif|ico|svg)",
  "svg_watch": "/img/svg-sprite/**/*.svg",
  "img_folder": "/assets/img",
}


let buildstatus = true;




/*---------------------------
 * SCSS COMPILE
 ---------------------------*/
const sass = require("gulp-sass")(require("sass"));
const plumber = require('gulp-plumber');
const autoprefixer = require('gulp-autoprefixer');
const sassGlob = require("gulp-sass-glob-use-forward");

const css = () => src(paths.src + paths.css_watch)
  .pipe(plumber({
    errorHandler: notify.onError('Error: <%= error.message %>')
  }))
  .pipe(sassGlob())
  .pipe(sass({
    outputStyle: "compressed"
  }))
  .pipe(
    autoprefixer({
      cascade: false,
      grid: true,
    })
  )
  .pipe(gulpIf(config.wp, dest(paths.pbwp + paths.css_folder)))
  .pipe(dest(paths.pb + paths.css_folder))
  .pipe(notify({
    title: 'Task running Gulp',
    message: 'sass file compiled.',
    sound: 'Tink',
  }));

/*---------------------------
 * JS COMPILE
 ---------------------------*/
const webpackConfig = require("./webpack.config");
const webpack = require("webpack");
const webpackStream = require("webpack-stream");
// const js = () => gulpIf(config.jsCompileMode, webpackStream(webpackConfig, webpack))
//   .on("error", function (e) {
//     this.emit("end");
//   })
//   .pipe(gulpIf(!config.jsCompileMode, src(paths.src + paths.js_watch)))
//   .pipe(gulpIf(config.wp, dest(paths.pbwp + paths.js_folder)))
//   .pipe(dest(paths.pb + paths.js_folder))
//   .pipe(notify({
//     title: 'Task running Gulp',
//     message: 'JS file compiled.',
//     sound: 'Tink',
//   }));
const js = () => webpackStream(webpackConfig, webpack)
  .on("error", function (e) {
    this.emit("end");
  })
  .pipe(gulpIf(config.wp, dest(paths.pbwp + paths.js_folder)))
  .pipe(dest(paths.pb + paths.js_folder))
  .pipe(notify({
    title: 'Task running Gulp',
    message: 'JS file compiled.',
    sound: 'Tink',
  }));


// JSをpublicにコピーするのみの場合
// const js = () => src(paths.src + paths.js_watch)
//   .pipe(gulpIf(buildstatus, changed(paths.pbwp + paths.js_folder)))
//   .pipe(gulpIf(config.wp, dest(paths.pbwp + paths.js_folder)))
//   .pipe(dest(paths.pb + paths.js_folder));

exports.js = js;

/*---------------------------
 * HTML/PHP COMPILE
 ---------------------------*/
const html = () => src([paths.src + paths.html_watch, "!_src/html/_inc/**/*.php", "!_src/html/_f/**/*.php"])
  .pipe(gulpIf(buildstatus, changed(paths.pb + paths.html_folder)))
  .pipe(dest(paths.pb + paths.html_folder));

const inc = () => src(paths.src + paths.inc_watch)
  .pipe(gulpIf(buildstatus, changed(paths.pb + paths.inc_folder)))
  .pipe(gulpIf(config.wp, dest(paths.pbwp + paths.inc_folder)))
  .pipe(dest(paths.pb + paths.inc_folder));

const wp = () => src(paths.src + paths.wp_watch)
  .pipe(gulpIf(buildstatus, changed(paths.pbwp + paths.html_folder)))
  .pipe(gulpIf(config.wp, dest(paths.pbwp + paths.html_folder)));


/*---------------------------
 * FILE COMPILE
 ---------------------------*/
const file = () => src(paths.src + paths.file_watch)
  .pipe(gulpIf(buildstatus, changed(paths.pbwp + paths.file_folder)))
  .pipe(gulpIf(config.wp, dest(paths.pbwp + paths.file_folder)))
  .pipe(dest(paths.pb + paths.file_folder));


/*---------------------------
 * IMG COMPILE
 ---------------------------*/
const path = require('path');
const chmod = require("gulp-chmod");
const imagemin = require("gulp-imagemin");
// const imageminPng = require("imagemin-pngquant");
// const imageminJpg = require("imagemin-jpeg-recompress");
// const imageminGif = require("imagemin-gifsicle");
// import imagemin from "gulp-imagemin";
// const gulpSquoosh = require("gulp-squoosh");
const squoosh = require('gulp-libsquoosh');


const img = () => src([paths.src + paths.img_watch, "!_src/img/svg-sprite/**/*", "!_src/img/svg-sprite-bg/**/*"])
  .pipe(gulpIf(buildstatus, changed(paths.pb + paths.img_folder)))
  .pipe(
    // gulpSquoosh()
    squoosh((args) => {
      // 拡張子を抽出
      const extname = path.extname(args.path);

      // png、jpg 以外（ここでは avif）用のデフォルト設定
      let options = {
        encodeOptions: squoosh.DefaultEncodeOptions[extname],
      };

      // png形式は png、webp の両方を出力する
      if (extname === '.png') {
        options = {
          encodeOptions: {
            oxipng: {
              quality: 80,
            },
            webp: {
              // ロスレス指定
              // 画像によっては lossless:false して quality 指定のほうが良いかも
              lossless: true,
            },
          },
        };
      }
      // jpeg形式は jpg、webp の両方を出力する
      if (extname === '.jpg') {
        options = {
          encodeOptions: {
            mozjpeg: {
              quality: 90,
            },
            webp: {
              quality: 80,
            },
          },
        };
      }
      // それ以外はデフォルト設定のまま
      return options;
    }),
  )
  // .pipe(
  //   imagemin([
  //     imagemin.gifsicle({ interlaced: true }),
  //     imagemin.optipng({ optimizationLevel: 5 }),
  //     imagemin.mozjpeg({ quality: 75, progressive: true }),
  //     imagemin.svgo({
  //       plugins: [
  //         { removeViewBox: true },
  //         { cleanupIDs: false }
  //       ]
  //     }),
  //     imageminPng({
  //       quality: [0.6, 0.7],
  //       speed: 1,
  //     }
  //     ),
  //     imageminJpg(),
  //     imageminGif({
  //       interlaced: false,
  //       optimizationLevel: 3,
  //       colors: 180,
  //       quality: "65-80",
  //       speed: 1,
  //       floyd: 0,
  //     }),
  //   ])
  // )
  // .pipe(chmod(0o755))
  .pipe(gulpIf(config.wp, dest(paths.pbwp + paths.img_folder)))
  .pipe(dest(paths.pb + paths.img_folder));

const svgSprite = require("gulp-svg-sprite");
const svg = () => src(paths.src + paths.svg_watch)
  .pipe(
    svgSprite({
      mode: {
        symbol: {
          dest: "icon",
          sprite: "sprite.svg",
        },
      },
    })
  )
  .pipe(gulpIf(config.wp, dest(paths.pbwp + paths.img_folder)))
  .pipe(dest(paths.pb + paths.img_folder));


/*---------------------------
 * LOCAL BROWSER
 ---------------------------*/
const connect = require("gulp-connect-php");
const browserSync = require("browser-sync");
const sync = () =>
  connect.server({
      port: config.port,
      base: "_public",
    },
    function () {
      browserSync.init({
        proxy: "127.0.0.1:" + config.port + config.rootPath,
        "notify": false
      });
    }
  );


const sync_docker = () =>
  connect.server({
      port: config.port,
      base: "_public",
    },
    function () {
      browserSync.init({
        proxy: "web_heteml:80" + config.rootPath,
        "notify": false
      });
    }
  );

const reload = done => {
  browserSync.reload()
  done()
}



/*---------------------------
 * WATCH
 ---------------------------*/
const watcher = () => {
  watch([paths.src + paths.css_watch], series(css, reload));
  watch([paths.src + paths.js_watch], series(js, reload));
  watch([paths.src + paths.html_watch], series(html, reload));
  watch([paths.src + paths.inc_watch], series(inc, reload));
  watch([paths.src + paths.wp_watch], series(wp, reload));
  watch([paths.src + paths.file_watch], series(file, reload));
  watch([paths.src + paths.svg_watch], series(svg, reload));
  watch([paths.src + paths.img_watch], series(img, reload));
}




/*---------------------------
 * GULP functions
 ---------------------------*/
exports.default = parallel(
  watcher,
  sync
);

exports.init = series(
  initon,
  // css, js, html, inc, wp, svg, file,
  // img,
  // parallel(css, js, html, inc, wp, svg, file),
  parallel(css, js, html, inc, wp, img, svg, file),
  initoff,
  // parallel(watcher, sync)
);

exports.docker = series(
  parallel(watcher, sync_docker)
);

function initon(cb) {
  buildstatus = false;
  cb();
}

function initoff(cb) {
  buildstatus = true;
  cb();
}
