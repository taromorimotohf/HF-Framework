//npm install --save-dev gulp gulp-watch gulp-sass gulp-pleeease gulp-plumber gulp-imagemin imagemin-pngquant

/**************************************************
 * modules laod
 *************************************************/
var gulp = require('gulp');
var watch = require('gulp-watch');
var sass = require('gulp-sass');
var pleeease = require('gulp-pleeease');
var plumber = require("gulp-plumber");
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var frontnote = require("gulp-frontnote");

/**************************************************
 * path
 *************************************************/
var cssDestPath = './common/css';
var scssPath = './common/sass';

/**************************************************
 * main tasks
 *************************************************/
/**
 * gulp--sass SCSSのコンパイル
 */
gulp.task('sass', function(){
  gulp.src('./common/sass/*.scss')
    .pipe(plumber())
    .pipe(sass())
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
 * frontnote スタイルガイド
 */
gulp.task('doc', function(){
  gulp.src('./common/sass/*.scss')
    .pipe(frontnote({
        css: '/common/css/guide.css',
        // template: './doc/template',
        overview: './doc/overview.md',
        out: './doc',
        includePath: 'assets/**/*'
    }))
    .pipe(plumber())
    .pipe(sass())
    .pipe(gulp.dest(cssDestPath));
});

/**************************************************
 * watch
 *************************************************/
gulp.task('watch', function() {
  gulp.watch( scssPath + '/*.scss', ['sass'] );
  return gulp.watch([ cssDestPath + '/*.css' ], ['pleeease']);
});