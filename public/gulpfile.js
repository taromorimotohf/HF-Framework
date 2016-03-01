/*
if packege.json is exist => npm install
if packege.json is not exist => npm install --save-dev gulp gulp-watch gulp-sass gulp-pleeease gulp-plumber gulp-imagemin imagemin-pngquant gulp-uglify
*/

/**************************************************
 * modules load
 *************************************************/
var gulp = require('gulp');
var watch = require('gulp-watch');
var sass = require('gulp-sass');
var pleeease = require('gulp-pleeease');
var plumber = require("gulp-plumber");
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var uglify = require('gulp-uglify');
/**************************************************
 * path
 *************************************************/
var cssDestPath = './common/css';
var scssPath = './common/sass';
var jsPath = './common/js';
/**************************************************
 * main tasks
 *************************************************/
/*
sass SCSSのコンパイル
*/
gulp.task('sass', function(){
  gulp.src('./common/sass/*.scss')
    .pipe(plumber())
    .pipe(sass({
      style   : 'expanded'
    }))
    .pipe(gulp.dest(cssDestPath));
});
/*
pleeease CSSのベンダープレフィックス付加や圧縮など
*/
gulp.task('pleeease', function () {
  gulp.src(cssDestPath + '/*.css')
    .pipe(pleeease({
        autoprefixer: {
            browsers: ['last 5 versions']
        },
        minifier: true
    }))
    .pipe(gulp.dest(cssDestPath));
});
/*
uglify JSを圧縮して*min.jsとして出力
*/
gulp.task('uglify', function(){
    gulp.src('./common/js/common.js')
        .pipe(uglify({preserveComments: 'some'}))
        .pipe(rename({
          extname: '.min.js'
        }))
        .pipe(gulp.dest(jsPath));
    ;
});
/**************************************************
 * option tasks
 *************************************************/
 /*
imagemin 画像の圧縮
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
/**************************************************
 * Run task
 *************************************************/
gulp.task('watch', function() {
  gulp.watch( scssPath + '/*.scss', ['sass'] );
  return gulp.watch([ cssDestPath + '/*.css' ], ['pleeease']);
});

gulp.task('default', function() {
  gulp.watch( scssPath + '/*.scss', ['sass'] );
  return gulp.watch([ cssDestPath + '/*.css' ]);
});