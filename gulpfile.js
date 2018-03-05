var gulp        = require('gulp');
var sass        = require('gulp-sass');
var connect     = require('gulp-connect-php');
var browserSync = require('browser-sync');

function swallowError(error) {
    console.log(error.toString());
    this.emit('end');
}

gulp.task('sass', function () {
    return gulp.src(['sass/**/*.scss'])
               .pipe(sass())
               .on('error', swallowError)
               .pipe(gulp.dest('css'))
               .pipe(browserSync.stream());
});

gulp.task('serve', ['sass'], function () {
    connect.server({
        base: 'app',
        port: 8000
    }, function () {
        browserSync({
            injectChanges: true,
            proxy        : '127.0.0.1:8000'
        });
    });

    gulp.watch(['sass/**/*.scss'], ['sass']);
    gulp.watch('app/*.php').on('change', function () {
        browserSync.reload();
    });
});

gulp.task('default', ['serve']);