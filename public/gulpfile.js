//npm install --save-dev gulp gulp-watch gulp-ruby-sass gulp-pleeease

/**************************************************
 * modules laod
 *************************************************/
var gulp       = require( 'gulp' );
var watch      = require( 'gulp-watch' );
var rubysass   = require( 'gulp-ruby-sass' );
var pleeease   = require( 'gulp-pleeease' );

/**************************************************
 * path
 *************************************************/
var cssDestPath       = './common/css';
var scssPath          = './common/sass';

/**************************************************
 * tasks
 *************************************************/
/**
 * gulp-ruby-sas
 */
gulp.task( 'sass', function() {
  return rubysass( scssPath, {
    style   : 'expanded',
    loadPath: [
      scssPath
    ]
  })
    .pipe( gulp.dest( cssDestPath ) );
});

/**
 * gulp-pleeease
 */
gulp.task('pleeease', function() {
  return gulp.src( cssDestPath + '/*.css' )
    .pipe(pleeease({
    autoprefixer: ['last 5 versions'],
    minifier: true,
  }))
    .pipe(gulp.dest( cssDestPath ));
});

/**************************************************
 * watch
 *************************************************/
gulp.task('watch', function() {
  gulp.watch( scssPath + '/*.scss', ['sass'] );
  return gulp.watch([ cssDestPath + '/*.css' ], ['pleeease']);
});