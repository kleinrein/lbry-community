exports.files = {
  javascripts: {
    joinTo: {
      'js/app.js': /^(app)/,
      'js/vendor.js': /^node_modules/,
    },
  },
  stylesheets: {
    joinTo: 'css/app.css'
  },
};

exports.plugins = {
  babel: {
    presets: ['latest', 'stage-0']
  },
  pleeease: {
    sass: true,
    autoprefixer: {
      browsers: ['> 1%'],
    },
  },
  copycat: {
    fonts: ['node_modules/bootstrap/dist/fonts'],
    onlyChanged: true,
  },
  static: {
    processors: [
      require('html-brunch-static')({
        processors: [
          require('pug-brunch-static')({
            fileMatch: 'app/index.pug',
            fileTransform: (filename) => filename.replace('.pug', '.html')
          })
        ]
      })
    ]
  },
  plugins: {
    browserSync: {
        port: 3333,
        logLevel: "debug"
    }
  }
};

exports.modules = {
  autoRequire: {
    'js/app.js': ['js/initialize'],
  },
};

exports.npm = {
  globals: {
    jQuery: 'jquery',
    $: 'jquery',
    bootstrap: 'bootstrap',
  },
  styles: {
    bootstrap: ['dist/css/bootstrap.css'],
  },
};
