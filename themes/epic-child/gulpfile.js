var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('styles', function() {
	gulp.src('*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest(''));
});

gulp.task('watch', function() {
	gulp.watch('*.scss', ['styles']);
});
