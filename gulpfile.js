'use strict';

var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-sass');
var del = require('del');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var clean = require('gulp-clean');
var browserSync = require('browser-sync').create();
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var beep = require('beepbeep');
var svgSprite = require('gulp-svg-sprite');
var php = require('gulp-connect-php');

gulp.task('log', function() {
    gutil.log('test');
});

gulp.task('browser-sync', function() {
    php.server({
         base: 'app/',
        index: "index.php",
        port: 8010,
        keepalive: true
    }, function() {
        browserSync.init({
            injectChanges: true,
            proxy: '127.0.0.1:8010',
            startPath: "/index.php"
        });
    });
});

gulp.task('clean-css', function() {
    return del([
        "app/assets/css/style.css",
        "app/assets/css/style.min.css",
        "app/assets/css/style.css.map",
        "app/assets/css/main.css",
        "app/assets/css/main.css.map"
    ]);
});


gulp.task('sass', function() {
    // var src = gulp.src('./sass/**/*.scss');
    var src = gulp.src([
        './sass/**/**/*.scss',
        '!./sass/bootstrap/*',
        ]);
    var dest = gulp.dest('app/assets/css');
    return src
        .pipe(sourcemaps.init())
        .pipe(sass({ 'outputStyle': 'expanded', 'sync': true }).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(sourcemaps.write('.'))
        .pipe(dest)
        .pipe(browserSync.stream());
});


gulp.task('watch:php', function() {
    gulp.watch('**/*.php').on('change', function() {
        browserSync.reload();
    });
});

gulp.task('watch:styles', function() {
    gulp.watch('./sass/**/*.scss', gulp.series('sass'), gulp.series(browserSync.reload))
});

gulp.task('watch:js', function() {
    gulp.watch(['app/assets/js/*.js']).on('change', gulp.series(browserSync.reload))
});

gulp.task('watch', gulp.series('sass',
    gulp.parallel('watch:styles', 'watch:js', 'watch:php')
));

gulp.task('default', gulp.series('clean-css', gulp.parallel('watch', 'browser-sync')));

// Build

gulp.task('sass-build', function() {
    // var src = gulp.src('./sass/**/*.scss');
    var src = gulp.src([
        './sass/**/**/*.scss',
        '!./sass/bootstrap/*',
        ]);
    var dest = gulp.dest('app/assets/css');
    return src
        .pipe(sourcemaps.init())
        .pipe(sass({ 'outputStyle': 'compressed', 'sync': true }).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(sourcemaps.write('.'))
        .pipe(dest)
        .pipe(browserSync.stream());
});

gulp.task('copy-sass', function() {
    return gulp.src([
            'sass/**/**'
        ])
        .pipe(gulp.dest('app/sass/'));
});

gulp.task('clean-sass', function() {
    return del([
        "app/sass"
    ]);
});

gulp.task('copy-php', function() {
    return gulp.src('app/**')
        .pipe(gulp.dest('dist'));
});

gulp.task('clean-dist', function() {
    return del([
        "app/sass"
    ]);
});

gulp.task("build", gulp.series(
    ['clean-sass', 'clean-dist'],
    gulp.parallel('copy-sass', 'sass-build'),
    'copy-php'
));



// gulp.task('clean-libs', function() {
//     return del([
//         "app/libs"
//     ]);
// });

// gulp.task('copy', function() {
//     return gulp.src([
//             'node_modules/bootstrap/dist/**/*',
//             'node_modules/popper.js/dist/umd/popper.min.js',
//             'node_modules/jquery/dist/*',
//             'node_modules/slick-carousel/slick/**',
//             'node_modules/smooth-scroll/dist/smooth-scroll.min.js'
//         ], { "base": "node_modules/" })
//         .pipe(gulp.dest('app/libs/'));
// });



// gulp.task('bootstrap-dev', function() {
//     return gulp.src([
//         'node_modules/bootstrap/scss/**/*'
//     ]).pipe(gulp.dest('sass/bootstrap'))
// })





// gulp.task('sass-build', function() {
//     // var src = gulp.src('./sass/**/*.scss');
//     var src = gulp.src('./sass/*.scss');
//     var dest = gulp.dest('app/css');
//     return src
//         .pipe(sass({ 'outputStyle': 'expanded' }).on('error', sass.logError))
//         .pipe(autoprefixer())
//         .pipe(dest);
// });



// gulp.task('watch:php', function() {
//     gulp.watch('./app/*.php', gulp.series('php'), gulp.series(browserSync.reload))
// });

// gulp.task('watch:templates', function() {
//     gulp.watch('./templates/**/*.html', gulp.series('fileinclude'))
// })



// gulp.task('watch', gulp.series('sass',
//     gulp.parallel('watch:styles', 'watch:js')
// ));

// gulp.task('default', gulp.series('clean-libs', gulp.parallel('watch', 'browser-sync')));

// gulp.task('img', function() {
//     return gulp.src('app/assets/**/*')
//         .pipe(gulp.dest('dist/assets'));
// });

// gulp.task('clean', function() {
//     return del([
//         "./dist"
//     ]);
// });


// gulp.task('assets-html', function() {
//     return gulp.src('app/*.html')
//         .pipe(gulp.dest('dist'));
// });

// gulp.task('assets-css', function() {
//     return gulp.src('app/css/**/*')
//         .pipe(gulp.dest('dist/css'));
// });

// gulp.task('assets-js', function() {
//     return gulp.src('app/js/*')
//         .pipe(gulp.dest('dist/js'));
// });
// gulp.task('assets-libs', function() {
//     return gulp.src('app/libs/**/*')
//         .pipe(gulp.dest('dist/libs'));
// });

// gulp.task('assets-data', function() {
//     return gulp.src('app/data/*.json')
//         .pipe(gulp.dest('dist/data'));
// });

// gulp.task('assets-xml', function() {
//     return gulp.src('app/*.xml')
//         .pipe(gulp.dest('dist'))
// })

// gulp.task('assets-plugins', function() {
//     return gulp.src('app/plugins/**/*')
//         .pipe(gulp.dest('dist/plugins'))
// })

// gulp.task('font', function() {
//     return gulp.src('app/fonts/**/*')
//         .pipe(gulp.dest('dist/fonts'));
// });

// gulp.task('assets', gulp.parallel(
//     'assets-html',
//     'assets-css',
//     'assets-js',
//     'assets-libs',
//     'assets-data',
//     'assets-xml',
//     'assets-plugins'));

// gulp.task("build", gulp.series(
//     'clean',
//     gulp.parallel('copy', 'img', 'sass-build', 'font'),
//     'assets'
// ));