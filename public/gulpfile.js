var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var cssnext = require('gulp-cssnext');

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
    .pipe(sourcemaps.init())
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
  ;
});

/**************************************************
 * option tasks
 *************************************************/
 /*
imagemin 画像の圧縮
*/
gulp.task('img', function () {
  var srcGlob = paths.srcDir + '/**/*.+(jpg|jpeg|png|gif|svg)';
  var dstGlob = paths.dstDir;
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