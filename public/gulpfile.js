/*
install => npm install
update check => npm-check-updates -u
update => npm update
*/
var gulp = require('gulp');
var sass = require('gulp-sass');
var cssnext = require('gulp-cssnext');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

/**************************************************
 * path
 *************************************************/
var paths = {
  'source': '',
  'scss': 'common/sass/',
  'img': 'common/img/',
  'commonJs': 'common/js/common.js',
  'distJs': 'common/js/',
  'distImg': 'common/_img/',
  'css': 'common/css/'
}

/**************************************************
 * Task
 *************************************************/
/*
SCSSをコンパイル
*/
gulp.task('scss', function() {
  return gulp.src(paths.scss + '**/*.scss')
    .pipe(sass({
      outputStyle: 'expanded'
    }))
    .on('error', function(err) {
      console.log(err.message);
    })
    .pipe(cssnext({
        browsers: ['last 5 versions']
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(paths.css));
});
/*
JSを圧縮して*min.jsとして出力
*/
gulp.task('js', function(){
  return gulp.src(paths.commonJs)
    .pipe(uglify({preserveComments: 'some'}))
    .pipe(rename({
      extname: '.min.js'
    }))
    .pipe(gulp.dest(paths.distJs));
});
/*
ブラウザー同期
*/
gulp.task('browser-sync', function() {
  browserSync.init({
    proxy: 'vagrantのIP'
  });
});
gulp.task("reload", function () {
    gulp.watch([paths.scss + '**/*.scss'], reload);
    gulp.watch([paths.img + '**/*.img'], reload);
    gulp.watch([paths.distJs + '**/*.js'], reload);
});
/**************************************************
 * option tasks
 *************************************************/
 /*
imagemin 画像の圧縮
*/
gulp.task('img', function () {
  var srcGlob = paths.img + '/**/*.+(jpg|jpeg|png|gif|svg)';
  var dstGlob = paths.distImg;
  var imageminOptions = {
    optimizationLevel: 7
  };
  gulp.src(img)
    .pipe(imagemin({
    progressive: true,
    svgoPlugins: [{
      removeViewBox: false
    }],
    use: [pngquant()]
  }))
    .pipe(gulp.dest(distImg));
});
/**************************************************
 * Run Task
 *************************************************/
gulp.task('watch', function() {
  gulp.watch([paths.scss + '**/*.scss'], ['scss']);
});
gulp.task('default', ['watch', 'browser-sync', 'reload']);