var gulp = require('gulp');

var preprocess=require('gulp-preprocess')
	,replace=require('gulp-replace')
	,sass=require('gulp-ruby-sass')
	;

gulp.task('scripts', function() {
  gulp.src(['./jspp/*.js'])
    .pipe(preprocess())
    .pipe(gulp.dest('./js/'))
});

gulp.task('sass', function() {
  return gulp.src(['scss/*.scss'])
    .pipe(sass())
    .pipe(gulp.dest('./gulp-sass/'));
});