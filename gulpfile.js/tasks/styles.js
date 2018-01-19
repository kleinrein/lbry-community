var gulp = require('gulp'),
    gutil = require('gulp-util'),
    plugins = require('gulp-load-plugins')({camelize: true}),
    config = require('../../gulpconfig').styles;


// Build stylesheets from source Sass files, post-process, and write source maps (for debugging) with libsass
gulp.task('styles-libsass', function () {
    return gulp.src(config.build.src)
        .pipe(plugins.sourcemaps.init()) // Note that sourcemaps need to be initialized with libsass
        .pipe(plugins.sass(config.libsass).on('error', plugins.sass.logError))
        .pipe(plugins.cssnano(config.cssnano))
        .pipe(plugins.sourcemaps.write('./'))
        .pipe(gulp.dest(config.build.dest));
});

// Easily configure the Sass compiler from `/gulpconfig.js`
gulp.task('styles', ['styles-' + config.compiler]);
