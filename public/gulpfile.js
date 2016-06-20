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

/**************************************************
 * path
 *************************************************/
var paths = {
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
    .pipe(cssnext({
        browsers: 'last 5 versions',
        features:{
          sourcemap: true
        }
    }))
    .pipe(gulp.dest(paths.css))
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
  ;
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
/*実行*/
gulp.task('default', function() {
  gulp.watch([paths.scss + '**/*.scss'], ['scss']);
});