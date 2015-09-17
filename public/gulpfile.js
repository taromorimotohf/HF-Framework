//npm install --save-dev gulp gulp-watch gulp-sass gulp-pleeease gulp-imagemin imagemin-pngquant

/**************************************************
 * modules laod
 *************************************************/
var gulp = require('gulp');
var watch = require('gulp-watch');
var sass = require('gulp-sass');
var pleeease = require('gulp-pleeease');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');

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

/**************************************************
 * watch
 *************************************************/
gulp.task('watch', function() {
  gulp.watch( scssPath + '/*.scss', ['sass'] );
  return gulp.watch([ cssDestPath + '/*.css' ], ['pleeease']);
});