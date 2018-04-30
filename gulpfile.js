let gulp = require('gulp');
let sass = require('gulp-sass');
let autoprefixer = require('gulp-autoprefixer');
// let minify = require('gulp-minify');
let plumber = require('gulp-plumber');
let notify = require('gulp-notify');
let pug = require('gulp-pug');
let browserSync = require("browser-sync").create();

gulp.task('sass', function() {
  return gulp.src('./src/styles/*.scss')
    .pipe(plumber())
    .pipe(sass()
      .on('error', sass.logError)
    )
    .pipe(autoprefixer({
      browsers: ['last 5 versions', 'opera 12', '> 1% in RU', 'ie 8']
    }))
    .pipe(gulp.dest('./dist/styles/.'));
});

gulp.task('pug', () => {
  return gulp.src('./src/**/*.pug')
    .pipe(pug())
    .pipe(gulp.dest('./dist/.'));
});

gulp.task('copy', () => {
  return gulp.src([
    './src/**/*',
    '!./src/styles/**/*',
    '!./src/app/**/*',
    '!./src/**/*.pug'
  ], {
    dot: true
  }).pipe(gulp.dest('./dist/.'));});

gulp.task('watch', function() {
  browserSync.init({
    server: {
      baseDir: './dist'
    }
  });
  gulp.watch('./src/**/*', ['sass','pug','copy']);
  gulp.watch('./src/**/*').on('change', browserSync.reload);;
});
