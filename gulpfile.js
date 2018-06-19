var gulp		= require('gulp'),
	concat		= require('gulp-concat'),
	uglify		= require('gulp-uglify'),
	cleanCSS 	= require('gulp-clean-css');


/*
* backend
--------------------------------------------------------------------
*/
gulp.task('css', function() {
	return gulp.src([
		'assets/plugins/bootstrap/dist/css/bootstrap.css',
		'assets/plugins/font-awesome/css/font-awesome.css',
		'assets/plugins/nprogress/nprogress.css',
		'assets/plugins/sweetalert/sweetalert.css',
		'assets/plugins/loader/loader.css',
		'assets/plugins/animate.css/animate.min.css',
		'assets/css/custom.min.css'
	])
	.pipe(cleanCSS())
	.pipe(concat('app.min.css'))
	.pipe(gulp.dest('assets/css'))
});

gulp.task('js', function() {
	return gulp.src([
		'assets/plugins/jquery/dist/jquery-3.3.1.min.js',
		'assets/plugins/bootstrap/dist/js/bootstrap.min.js',
		'assets/plugins/fastclick/lib/fastclick.js',
		'assets/plugins/nprogress/nprogress.js',
		'assets/plugins/jquery-validation/jquery.validate.min.js',
		'assets/plugins/sweetalert/sweetalert.min.js',
		'assets/js/custom.js'
	])
	.pipe(uglify())
	.pipe(concat('app.min.js'))
	.pipe(gulp.dest('assets/js'))
});
/*
* -----------------------------------------------------------------------
*/


/*
* frontend
--------------------------------------------------------------------
*/
gulp.task('css', function() {
	return gulp.src([
		'assets/obaju/css/font-awesome.css',
		'assets/obaju/css/bootstrap.min.css',
		'assets/obaju/css/animate.min.css',
		'assets/obaju/css/owl.carousel.css',
		'assets/obaju/css/owl.theme.css',
		'assets/obaju/css/style.default.css',
		'assets/obaju/css/custom.css'
	])
	.pipe(cleanCSS())
	.pipe(concat('frontend.min.css'))
	.pipe(gulp.dest('assets/css'))
});

gulp.task('js', function() {
	return gulp.src([
		'assets/obaju/js/respond.min.js',
		'assets/obaju/js/jquery-1.11.0.min.js',
		'assets/obaju/js/bootstrap.min.js',
		'assets/obaju/js/jquery.cookie.js',
		'assets/obaju/js/waypoints.min.js',
		'assets/obaju/js/modernizr.js',
		'assets/obaju/js/bootstrap-hover-dropdown.js',
		'assets/obaju/js/owl.carousel.min.js',
		'assets/obaju/js/front.js'
	])
	.pipe(uglify())
	.pipe(concat('frontend.min.js'))
	.pipe(gulp.dest('assets/js'))
});

/*
* -----------------------------------------------------------------------
*/

gulp.task('default', ['css','js']);