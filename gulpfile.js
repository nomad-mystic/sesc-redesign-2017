'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
// var scsslint = require('gulp-scss-lint');

// gulp.task('scss-lint', function() {
//   return gulp.src('./wp-content/themes/woo-child/sass/*.scss')
//     .pipe(scsslint());
// });

gulp.task('sass', function () {
  return gulp.src('./wp-content/themes/woo-child/sass/*.scss')
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(gulp.dest('./wp-content/themes/woo-child/css'));
});

gulp.task('sass:watch', function () {
  gulp.watch('./wp-content/themes/woo-child/sass/*.scss', ['sass']);
});
