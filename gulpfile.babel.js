'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');

const babel = require('gulp-babel');
const print = require('gulp-print');

const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const browserify = require('browserify');
const watchify = require('watchify');
// const babel = require('babelify');
const rollup = require('rollup-stream');
const uglify = require('gulp-uglify');
const gutil = require('gulp-util');


gulp.task('script', function() {
  return rollup({entry: './wp-content/themes/woo-child/js/main.js'})
    .pipe(source('./wp-content/themes/woo-child/js/main.js'))
    .pipe(buffer())
    .pipe(babel())
    .pipe(gulp.dest('./wp-content/themes/woo-child/build/js'));
});

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
    return gulp.src('./wp-content/themes/woo-child/js/*.js')    // #1. select all js files in the app folder
        .pipe(print())                          // #2. print each file in the stream
        .pipe(babel({
            presets: ['es2015']
        }))    // #3. transpile ES2015 to ES5 using ES2015 preset
        .pipe(gulp.dest('./wp-content/themes/woo-child/build/js'))
        .pipe(livereload());               // #4. copy the results to the build folder
});

gulp.task('javascript', function () {
  // set up the browserify instance on a task basis
  var b = browserify({
    entries: './wp-content/themes/woo-child/js/main.js',
    debug: true
  });

  return b.bundle()
    .pipe(source('./wp-content/themes/woo-child/js/main.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({loadMaps: true}))
        // Add transformation tasks to the pipeline here.
        .pipe(uglify())
        .on('error', gutil.log)
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./wp-content/themes/woo-child/build/js/'));
});

// For JS Compile
// function compile(watch) {
//   var bundler = watchify(browserify('./wp-content/themes/woo-child/js/main.js', { debug: true }).transform(babel));
//
//   function rebundle() {
//     bundler.bundle()
//       .on('error', function(err) { console.error(err); this.emit('end'); })
//       .pipe(source('./wp-content/themes/woo-child/js/main.js'))
//       .pipe(buffer())
//     //   .pipe(sourcemaps.init({ loadMaps: true }))
//     //   .pipe(sourcemaps.write('./'))
//       .pipe(gulp.dest('./wp-content/themes/woo-child/build/js'));
//   }
//
//   if (watch) {
//     bundler.on('update', function() {
//       console.log('-> bundling...');
//       rebundle();
//     });
//   }
//
//   rebundle();
// }

gulp.task('watch', () => {
    livereload.listen();
    gulp.watch('./wp-content/themes/woo-child/sass/*.scss', ['sass']);
    gulp.watch('./wp-content/themes/woo-child/js/*.js', ['js']);
});

gulp.task('build-js', function() { return compile(); });
