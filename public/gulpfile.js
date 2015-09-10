//npm install --save-dev gulp gulp-watch gulp-ruby-sass gulp-pleeease gulp-imagemin imagemin-pngquant gulp-frontnote

/**************************************************
 * modules laod
 *************************************************/
var gulp = require('gulp');
var watch = require('gulp-watch');
var rubysass = require('gulp-ruby-sass');
var pleeease = require('gulp-pleeease');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var frontNote = require("gulp-frontnote");

/**************************************************
 * path
 *************************************************/
var cssDestPath = './common/css';
var scssPath = './common/sass';

/**************************************************
 * main tasks
 *************************************************/
/**
 * gulp-ruby-sass SCSSファイルのコンパイル
 */
gulp.task('sass', function () {
  return rubysass(scssPath, {
      style: 'expanded',
      loadPath: [
      scssPath
    ]
    })
    .pipe(gulp.dest(cssDestPath));
});

/**
 * gulp-pleeease CSSのベンダープレフィックス付加や圧縮など
 */
gulp.task('pleeease', function () {
  return gulp.src(cssDestPath + '/*.css')
    .pipe(pleeease({
      autoprefixer: ['last 5 versions'],
      minifier: false,
    }))
    .pipe(gulp.dest(cssDestPath));
});

/**************************************************
 * option tasks
 *************************************************/
/**
 * imagemin 画像の圧縮
 */
var paths = {
  srcDir: 'common/img',
  dstDir: 'common/img_min'
}

gulp.task('img', function () {
  var srcGlob = paths.srcDir + '/**/*.+(jpg|jpeg|png|gif|svg)';
  var dstGlob = paths.dstDir;
  var imageminOptions = {
    optimizationLevel: 7
  };

  gulp.src(srcGlob)
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{
        removeViewBox: false
      }],
      use: [pngquant()]
    }))
    .pipe(gulp.dest(dstGlob));
});

/**
 * frontNote スタイルガイドの作成
 */
gulp.task('guide', function() {
  gulp.src('common/css/**/*.css')
    .pipe(frontNote({
    out: '_guide',
  }));
});

/**************************************************
 * watch
 *************************************************/
gulp.task('watch', function () {
  gulp.watch(scssPath + '/*.scss', ['sass']);
  return gulp.watch([cssDestPath + '/*.css'], ['pleeease']);
});