var gulp = require('gulp');
var notify = require("gulp-notify");
var sass = require('gulp-sass')(require('sass'));
var merge = require('merge-stream');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var plumber = require('gulp-plumber');
var imagemin = require('gulp-imagemin');

/*
 * Define our tasks using plain functions
 */
function styles() {
    // Compile scss
    var scssStream = gulp.src('assets/scss/main.scss')
        .pipe(sass().on('error', sass.logError));

    // Retrieve css
    var cssStream = gulp.src('assets/css/**/*.css')
        .pipe(concat('css.css'));

    // Merge scss and css into styles.css
    return merge(scssStream, cssStream)
        .pipe(concat('styles.css'))
        .pipe(gulp.dest('public/assets/css'))
        .pipe(notify({message: 'Styles task complete'}));
}

function scripts() {
    return gulp.src('assets/js/**/*.js')
        .pipe(plumber())
        .pipe(uglify())
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest('public/assets/js'))
        .pipe(notify({message: 'Scripts task complete'}));
}

function vendor() {
    var vendorFiles = [
        'node_modules/jquery/dist/jquery.js',
        'node_modules/pickadate/lib/compressed/picker.js',
        'node_modules/pickadate/lib/compressed/picker.date.js',
        'node_modules/pickadate/lib/compressed/translations/nl_NL.js',
        'node_modules/pickadate/lib/compressed/themes/default.css',
        'node_modules/pickadate/lib/compressed/themes/default.date.css',
        'node_modules/hover.css/css/hover-min.css',
        'node_modules/font-awesome/css/font-awesome.css'
    ];
    var vendorDir = 'public/assets/vendor';
    return gulp.src(vendorFiles)
        .pipe(gulp.dest(vendorDir));
}

function optimizeImages() {
    return gulp .src("./assets/images/**/*")
        .pipe(imagemin())
        .pipe(gulp.dest("./public/assets/images"));
}

function watch() {
    gulp.watch([
        'assets/scss/**/*.scss',
        'assets/css/**/*.css'
    ], styles);
    gulp.watch([
        'assets/js/**/*.js'
    ], scripts);
}

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
var build = gulp.series(gulp.parallel(styles, scripts, vendor, optimizeImages));

/*
 * You can use CommonJS `exports` module notation to declare tasks
 */
exports.styles = styles;
exports.scripts = scripts;
exports.vendor = vendor;
exports.optimizeImages = optimizeImages;
exports.watch = watch;
exports.build = build;
/*
 * Define default task that can be called by just running `gulp` from cli
 */
exports.default = build;
