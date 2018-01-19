var gulp = require('gulp'),
    plugins = require('gulp-load-plugins')({camelize: true}),
    config = require('../../gulpconfig').watch;

gulp.task('watch-browsersync', ['browsersync'], function () {
    gulp.watch(config.src.styles, ['styles']);
    gulp.watch(config.src.scripts, ['scripts']);
    gulp.watch(config.src.images, ['images']);
    gulp.watch(config.src.theme, ['theme']);
});

gulp.task('watch', ['watch-' + config.watcher]);
