'use strict';

var styleCssBanner = ['/**',
  ' * Theme Name: <%= pkg.config.theme.title %>',
  ' * Theme URI: <%= pkg.homepage %>',
  ' * Author: <%= pkg.contributors[0].name %>',
  ' * Author URI: <%= pkg.contributors[0].url %>',
  ' * Description: <%= pkg.description %>',
  ' * Version: <%= pkg.version %>',
  ' * License: <%= pkg.config.theme.license %>',
  ' * License URI: <%= pkg.config.theme.licenseuri %>',
  ' * Text Domain: <%= pkg.config.themetextdomain %>',
  ' * Tags: <%= pkg.config.themetags %>',
  ' * Domain Path: /languages',
  ' * Template: genesis',
  ' */',
  ''].join('\n');

var gulp = require('gulp'),
  header = require('gulp-header'),
  pkg = require('./package.json'),
  rename = require('gulp-rename'),
  sass = require('gulp-sass'),
  sourcemaps = require('gulp-sourcemaps')

gulp.task('default', function( done ) {
  gulp.src('sass/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(rename('style.css'))
    .pipe(header(styleCssBanner, { pkg: pkg } ))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('.'));
  done();
});
