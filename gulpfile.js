var gulp        = require('gulp');
var sass        = require('gulp-sass');
var connect     = require('gulp-connect-php');
var browserSync = require('browser-sync').create();

function swallowError(error) {
    console.log(error.toString());
    this.emit('end');
}

gulp.task('sass', function () {
    return gulp.src(['node_modules/bootstrap/scss/bootstrap.scss', 'sass/*.scss'])
               .pipe(sass())
               .on('error', swallowError)
               .pipe(gulp.dest('css/'))
               .pipe(browserSync.stream());
});

gulp.task('js', function () {
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js', 'node_modules/popper.js/dist/umd/popper.min.js'])
               .pipe(gulp.dest('js/'))
               .pipe(browserSync.stream());
});

gulp.task('serve', ['sass'], function () {
    connect.server({}, function () {
        browserSync.init({
            injectChanges: true,
            proxy        : '127.0.0.1:8000'
        });
    });

    gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', 'sass/*.scss'], ['sass']);
    gulp.watch(['*.php', 'section/*.html']).on('change', browserSync.reload);
});

gulp.task('default', ['js', 'serve']);