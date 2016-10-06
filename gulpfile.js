var gulp 			= require('gulp'),
    minify 		= require('gulp-minify'),
    watch 		= require('gulp-watch'),
    cleanCSS 	= require('gulp-clean-css'),
    rename   	= require('gulp-rename'),
    postcss 	= require('gulp-postcss'),
    bless 		= require('gulp-bless'),
		sass 			= require('gulp-sass'),
		zip 			= require('gulp-zip'),
		autoprefixer = require('autoprefixer'),
    browserSync  = require('browser-sync').create();

// me.js contains vars to your specific setup
var me = require('../me.js');

var WEBSITE 		= me.WEBSITE,
		PLUGIN_NAME = __dirname.match(/([^\/]*)\/*$/)[1];

var		JS_EXCLD  = '!assets/js/*min.js',
      JS_SRC    = 'assets/js/*.js',
      JS_DEST   = 'assets/js/';

var		CSS_EXCLD = '!assets/css/*.min.css',
      CSS_SRC   = 'assets/css/*.css',
      CSS_DEST  = 'assets/css/',
			SASS_SRC  = 'assets/scss/*.scss';

var		ZIP_SRC_ARR = ['./**','!./composer.*', '!./gulpfile.js', '!./package.json', '!./README.md', '!./phpcs.xml', '!./phpunit.xml.dist', '!./{node_modules,node_modules/**}', '!./{bin,bin/**}', '!./{dist,dist/**}', '!./{vendor,vendor/**}', '!./{tests,tests/**}' ],
			ZIP_OPTS = { base: '..' };

var PHP_SRC   = '**/*.php';

gulp.task('build-css', function() {
  gulp.src( [ CSS_SRC, CSS_EXCLD ] )
    .pipe(postcss([
          autoprefixer({browsers: ['> 5% in US']})
        ]))
    //.pipe(bless())
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest( CSS_DEST ))
    .pipe(browserSync.stream());
});

gulp.task('build-sass', function() {
	gulp.src( SASS_SRC )
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest(CSS_DEST));
});

gulp.task('build-js', function(){
  gulp.src( [ JS_SRC, JS_EXCLD ] )
    .pipe(minify({
        noSource: true
    }))
    .pipe(gulp.dest( JS_DEST ));
});

gulp.task('js-watch', ['build-js'], function(){
  browserSync.reload();
});


gulp.task('default', function() {

  browserSync.init({
        proxy: WEBSITE
  });

	gulp.watch( SASS_SRC, ['build-sass']);
  gulp.watch( CSS_SRC, ['build-css']);
  gulp.watch( JS_SRC , ['js-watch']);
  gulp.watch( PHP_SRC, function(){
    browserSync.reload();
  });

});

gulp.task('zip', function(){
	return gulp.src( ZIP_SRC_ARR, ZIP_OPTS )
		.pipe( zip( PLUGIN_NAME + '.zip' ) )
		.pipe( gulp.dest('dist') );
});

gulp.task('build', ['build-sass','build-css','build-js']);
