let gulp = require('gulp'),
  sass = require('gulp-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  plumber = require('gulp-plumber'),
  postcss = require('gulp-postcss'),
  postcssClean = require('postcss-clean'),
  postcssMergeRules = require('postcss-merge-rules'),
  pug = require('gulp-pug'),
  browserSync = require("browser-sync").create();
// minify = require('gulp-minify'),
// notify = require('gulp-notify'),

gulp.task('sass', function() {
  let postCSSProcessors = [
    // postcssMergeRules,
    postcssClean
  ];
  return gulp.src('./src/styles/*.sass')
    .pipe(plumber())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({browsers: ['last 5 versions', 'opera 12', '> 1% in RU', 'ie 8']}))
    .pipe(postcss(postCSSProcessors))
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
    '!./src/**/*.pug',
    '!./src/assets/app/main.js'
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
  gulp.watch('./dist/**/*').on('change', browserSync.reload);;
});