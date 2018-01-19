var gulp = require('gulp'),
    plugins = require('gulp-load-plugins')({camelize: true}),
    merge = require('merge-stream'),
    config = require('../../gulpconfig').scripts;


gulp.task('scripts-bundle', function () {
    var bundles = [];
    for (var bundle in config.bundles) {
        if (config.bundles.hasOwnProperty(bundle)) {
            var chunks = [];

            // Iterate through each bundle and mash the chunks together
            config.bundles[bundle].forEach(function (chunk) {
                chunks = chunks.concat(config.chunks[chunk]);
            });

            // Push the results to the bundles array
            bundles.push([bundle, chunks]);
        }
    }

    // Iterate through each bundle in the bundles array
    var tasks = bundles.map(function (bundle) {
        return gulp.src(bundle[1])
            .pipe(plugins.concat(bundle[0].replace(/_/g, '-') + '.js'))
            .pipe(gulp.dest(config.dest));
    });

    return merge(tasks);
});

// Minify scripts in place
gulp.task('scripts-minify', ['scripts-bundle'], function () {
    return gulp.src(config.minify.src)
        .pipe(plugins.sourcemaps.init())
        .pipe(plugins.uglify(config.minify.uglify))
        .pipe(plugins.sourcemaps.write('./'))
        .pipe(gulp.dest(config.minify.dest));
});

gulp.task('scripts', ['scripts-minify']);
