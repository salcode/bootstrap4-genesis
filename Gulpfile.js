'use strict';

var sassFiles = 'sass/main.scss',
  jsFiles = [ 'js/custom/**/*.js' ];

var sassConfig = {
	outputStyle: 'compressed'
};

var styleCssBanner = ['/**',
  ' * Theme Name: <%= theme.name %>',
  ' * Theme URI: <%= theme.uri %>',
  ' * Author: <%= theme.author %>',
  ' * Author URI: <%= theme.authoruri %>',
  ' * Description: <%= theme.description %>',
  ' * Version: <%= theme.version %>',
  ' * License: <%= theme.license %>',
  ' * License URI: <%= theme.licenseuri %>',
  ' * Text Domain: <%= theme.textdomain %>',
  ' * Tags: <%= theme.tags %>',
  ' * Domain Path: <%= theme.domainpath %>',
  ' * Template: <%= theme.template %>',
  ' * Notes: <%= theme.notes %>',
  ' */',
  ''].join('\n');

var concat = require('gulp-concat'),
  gulp = require('gulp'),
  header = require('gulp-header'),
  pkg = require('./package.json'),
  rename = require('gulp-rename'),
  sass = require('gulp-sass'),
  sourcemaps = require('gulp-sourcemaps'),
  uglify = require('gulp-uglify');

gulp.task('build:css', function( done ) {
  gulp.src('sass/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass(sassConfig).on('error', sass.logError))
    .pipe(rename('style.css'))
    .pipe(header(styleCssBanner, { theme: pkg.config.theme } ))
    .pipe(sourcemaps.write('./sass'))
    .pipe(gulp.dest('.'));
  done();
});

gulp.task('build:js', function( done ) {
  gulp.src(['node_modules/bootstrap/dist/js/bootstrap.bundle.js'].concat(jsFiles))
    .pipe(sourcemaps.init())
    .pipe(concat('javascript.min.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./js'));
  done();
});

gulp.task("watch", function(done) {

  sassConfig.outputStyle = 'nested';
  gulp.watch(sassFiles, gulp.parallel('build:css'));

  gulp.watch(jsFiles, gulp.parallel('build:js'));

  done();
});

gulp.task('build', gulp.parallel('build:css', 'build:js'));
