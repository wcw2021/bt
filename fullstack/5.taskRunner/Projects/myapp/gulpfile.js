var gulp = require('gulp');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass')(require('sass'));
var jshint = require('gulp-jshint');
var webserver = require('gulp-webserver');

// test task
gulp.task('test', function(){
  console.log('testing task ran...');
});

// minify js
gulp.task('minifyjs', function(){
  return gulp.src('src/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('app/js'));
});

// compile sass
gulp.task('sass', function(){
  return gulp.src('scss/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('app/css'));
})

//jshint
gulp.task('jshint', function(){
  return gulp.src('src/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
})

//webserver
gulp.task('webserver', function(){
  return gulp.src('app')
    .pipe(webserver({
      port: '8000',
      livereload: true,
      open:true
    }));
})

// default task
gulp.task('default', gulp.series('minifyjs', 'sass', 'jshint', 'webserver'));

