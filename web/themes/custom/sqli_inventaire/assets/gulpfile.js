// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify-es').default;
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');

const autoprefixer0ptions = {
    browsers: ['> 0%'],
    cascade: false
};
// Lint Task
gulp.task('lint', function() {
    return gulp.src('js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
gulp.task('sass', function() {
    return gulp.src('scss/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer(autoprefixer0ptions))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('css'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('js/modules/*.js')
        .pipe(sourcemaps.init())
        .pipe(concat('main.js'))
        .pipe(gulp.dest('js'))
        .pipe(rename('main.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('js'));
});
// vendors
gulp.task('vendors', function() {
    return gulp.src('js/vendors/*.js')
        .pipe(concat('vendors.js'))
        .pipe(gulp.dest('js'))
        .pipe(rename('vendors.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('js'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('js/**/*.js', ['lint', 'scripts']);
    gulp.watch('scss/**/*.scss', ['sass']);
});

// Build Task
gulp.task('build', ['lint', 'sass', 'vendors', 'scripts']);

// Default Task
gulp.task('default', ['lint', 'sass', 'vendors', 'scripts', 'watch']);
