var gulp        = require('gulp');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;
var sass        = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var rename = require("gulp-rename");

// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    //watch files
    var files = [
        './style.css',
        './*.php'
    ];

    //initialize browsersync
    browserSync.init(files, {
        //browsersync with a php server
        proxy: "http://www.site.dev/",
        notify: false
    });
});

// Sass task, will run when any SCSS files change & BrowserSync
// will auto-update browsers
//gulp.task('sass', function () {
//    return gulp.src('sass/*.scss')
//        .pipe(sass())
//        .pipe(gulp.dest('./'))
//        .pipe(reload({stream:true}));
//});

gulp.task('sass', function(){
    return gulp.src('sass/*.scss')
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions','ie 9', 'opera 12.1']
        }))
        .pipe(gulp.dest('./'))
        .pipe(minifyCSS())
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest('./'))
        .pipe(reload({stream:true}));
});

// Default task to be run with `gulp`
gulp.task('default', ['sass', 'browser-sync'], function () {
    gulp.watch("sass/**/*.scss", ['sass']);
});