// Project paths
var project = 'lbrycommunity',
    src = './src/',
    build = './build/',
    dist = './dist/' + project + '/',
    bower = './bower_components/',
    modules = './node_modules/';

// Project settings
module.exports = {

    browsersync: {
        files: [build + '/**', '!' + build + '/**.map'],
        notify: true,
        open: true,
        port: 3000,
        proxy: 'http://lbrycommunity.dev/',
        watchOptions: {
            debounceDelay: 1200
        }
    },

    images: {
        build: {
            src: src + '**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)',
            dest: build
        },
        dist: {
            src: [dist + '**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)', '!' + dist + 'screenshot.png'],
            imagemin: {
                optimizationLevel: 7,
                progressive: true,
                interlaced: true
            },
            dest: dist
        }
    },

    livereload: {
        port: 35729
    },

    scripts: {
        bundles: {
            scripts: ['scripts']
        },
        chunks: {
            scripts: [
                src + 'js/main.js'
            ]
        },
        dest: build + 'js/',
        lint: {
            src: [src + 'js/**/*.js']
        },
        minify: {
            src: build + 'js/**/*.js',
            uglify: {},
            dest: build + 'js/'
        }
    },

    styles: {
        build: {
            src: src + 'scss/**/*.scss',
            dest: build
        },
        compiler: 'libsass',
        cssnano: {
            autoprefixer: {
                add: true,
                browsers: ['> 3%', 'last 2 versions', 'ie 9', 'ios 6', 'android 4']
            }
        },
        libsass: {
            includePaths: [
                './src/scss',
                modules + 'normalize.css',
                modules,
                bower
            ],
            precision: 6,
            onError: function (err) {
                return console.log(err);
            }
        }
    },
    theme: {
        lang: {
            src: src + 'languages/**/*',
            dest: build + 'languages/'
        },
        php: {
            src: src + '**/*.php',
            dest: build
        }
    },
    utils: {
        clean: [build + '**/.DS_Store'],
        wipe: [dist],
        dist: {
            src: [build + '**/*', '!' + build + '**/*.map'],
            dest: dist
        }
    },
    watch: {
        src: {
            styles: src + 'scss/**/*.scss',
            scripts: src + 'js/**/*.js',
            images: src + '**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)',
            theme: src + '**/*.php'
        },
        watcher: 'browsersync'
    }
};
