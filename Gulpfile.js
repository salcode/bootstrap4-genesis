'use strict';

var sassFiles = 'sass/main.scss';

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

var gulp = require('gulp'),
  header = require('gulp-header'),
  pkg = require('./package.json'),
  rename = require('gulp-rename'),
  sass = require('gulp-sass'),
  sourcemaps = require('gulp-sourcemaps')

gulp.task('build:css', function( done ) {
  gulp.src('sass/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass(sassConfig).on('error', sass.logError))
    .pipe(rename('style.css'))
    .pipe(header(styleCssBanner, { theme: pkg.config.theme } ))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('.'));
  done();
});

gulp.task("watch", function(done) {

  sassConfig.outputStyle = 'nested';
  gulp.watch(sassFiles, gulp.parallel('build:css'));

  done();
});

gulp.task('build', gulp.parallel('build:css'));
