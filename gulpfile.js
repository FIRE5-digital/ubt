/* MODULES */
const
  gulp = require('gulp'),
  sass = require('gulp-sass'),
  postcss = require('gulp-postcss'),
  autoprefixer = require('autoprefixer'),
  cssnano = require('cssnano'),
  sourcemaps = require('gulp-sourcemaps'),
  uglify = require('gulp-uglify-es').default,
  concat = require('gulp-concat'),
  babel = require('gulp-babel'),
  versions = require('gulp-version-number')

/* PATHS */
const paths = {
  styles: {
    src: 'scss/**/*.scss',
    dest: 'css/',
    min: 'css/',
  },
  js: {
    src: 'scripts/main.js',
    min: 'js/',
  },
  html: {
    inc: 'inc/',
    scripts: 'inc/scripts.blade.php'
  }
}

/* Adds version to CSS and JS */
const versionConfig = {
  append: {
    cover: 1,
    to: [
      {type: 'js', value: '%DT%', key: 'v', files:['main.min.js']},
      {type: 'css', value: '%DT%', key: 'v', files:['app.min.css']}
    ]
  }
};

/* TASKS */
function compileSass() {
  return gulp
    .src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'expanded',
    })).on('error', sass.logError)
    .pipe(postcss([autoprefixer()]))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(postcss([cssnano()]))
    .pipe(concat('app.min.css'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.styles.min));
}

function compileJs() {
  return gulp
    .src([paths.js.src])
    .pipe(concat('main.min.js'))
    .pipe(sourcemaps.init())
    .pipe(babel({presets: ['@babel/preset-env'] }))
    .pipe(uglify())
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.js.min));
}

function compileHtml() {
  return gulp
    .src([paths.html.scripts])
    .pipe(versions(versionConfig))
    .pipe(gulp.dest([paths.html.inc]));
}

function watcher() {
  gulp.watch(paths.styles.src, { ignoreInitial: false }, gulp.series(compileSass, compileHtml));
  gulp.watch(paths.js.src, { ignoreInitial: false }, gulp.series(compileJs, compileHtml));
}

/* COMMANDS */

// Watch - runs on change
exports.watcher = watcher

// Tasks - runs once
exports.css = compileSass
exports.js = compileJs
exports.html = compileHtml
