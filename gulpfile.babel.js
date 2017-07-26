'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');

const babel = require('gulp-babel');
const print = require('gulp-print');

const livereload = require('gulp-livereload');

gulp.task('sass', () => {
    return gulp.src('./wp-content/themes/woo-child/sass/*.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest('./wp-content/themes/woo-child/build/css'))
        .pipe(sourcemaps.init())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))

        .pipe(concat('sesc_custom_styles.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./wp-content/themes/woo-child/build/css'))
        .pipe(livereload());
});

gulp.task('js', () => {
    return gulp.src('./wp-content/themes/woo-child/js/*.js')               // #1. select all js files in the app folder
        .pipe(print())                           // #2. print each file in the stream
        .pipe(babel({ presets: ['es2015'] }))    // #3. transpile ES2015 to ES5 using ES2015 preset
        .pipe(gulp.dest('./wp-content/themes/woo-child/build/js'))
        .pipe(livereload());               // #4. copy the results to the build folder
});

gulp.task('watch', () => {
    livereload.listen();
    gulp.watch('./wp-content/themes/woo-child/sass/*.scss', ['sass']);
    gulp.watch('./wp-content/themes/woo-child/js/*.js', ['js']);
});
