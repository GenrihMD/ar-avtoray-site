var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
// var minify = require('gulp-minify');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');

gulp.task('sass', function() {
  return gulp.src('./src/styles/main.scss')
    .pipe(plumber())
    .pipe(sass()
      .on('error', sass.logError)
    )
    .pipe(autoprefixer({
      browsers: ['last 5 versions', 'opera 12', '> 1% in RU', 'ie 8']
    }))
    .pipe(gulp.dest('./dist/css/.'));
});

gulp.task('watch', function() {
  gulp.watch('./src/**/*.*', ['sass']);
});
