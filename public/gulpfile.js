//npm install --save-dev gulp gulp-watch gulp-sass gulp-ruby-sass
/**************************************************
 * modules laod
 *************************************************/
var gulp       = require( 'gulp' );
var watch      = require( 'gulp-watch' );
var rubysass   = require( 'gulp-ruby-sass' );

/**************************************************
 * path
 *************************************************/
var cssSrcPath        = './common/sass';
var cssDestPath       = './common/css';
var scssPath          = './common/sass';

/**************************************************
 * tasks
 *************************************************/

/**
 * rubysass
 */
gulp.task( 'rubysass', function() {
    return rubysass( cssSrcPath, {
            style   : 'expanded',
            loadPath: [
                cssSrcPath
            ]
        } )
        .pipe( gulp.dest( cssDestPath ) );
} );

/**
 * watch
 */
gulp.task( 'watch', ['rubysass'], function() {
    gulp.watch( scssPath + '/*.scss', ['rubysass'] );
} );
