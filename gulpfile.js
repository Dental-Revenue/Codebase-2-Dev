
/**
 * NPM MODULES
 *
 */
var node_path = require('path');
var argv = require('yargs').argv;
var pngquant = require('imagemin-pngquant');
var buffer = require('vinyl-buffer');
var source = require('vinyl-source-stream');
var gulp = require('gulp');
var $if  = require('gulp-if');
var sequence = require('gulp-sequence');
var mediaQuery = require('gulp-group-css-media-queries');
var gap = require('gulp-append-prepend');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var rename = require("gulp-rename");
var uglify = require('gulp-uglify');
var changed = require('gulp-changed');
var imagemin = require('gulp-imagemin');
var babel = require('gulp-babel');
var sourcemaps = require('gulp-sourcemaps');
var watchify = require('watchify');
var browserify = require('browserify');

/**
 * PRODUCTION FLAG
 *
 * Run --production after any Gulp task to perform a production build
 */
var production = argv.production;


/**
 * PATH VARIABLES
 *
 */

/** Paths */
var enter     = 'assets/';

/** Base (entry) paths */
var base = {
  'img':       enter + 'images_edit/**',
  'sass':  enter + 'stylesheets/style.scss',
  'scripts': 	 enter + 'scripts/scripts.js'
  }

/** Destination (to) paths */
var dest = {
	'img':      enter + 'images',
  'css':      enter + 'stylesheets',
  'scripts': 	enter + 'scripts'
};



/**
 * SASS TASK
 *
 * Runs foreach on every file in 'sass/main'
 */
gulp.task('process_sass', function() {
	name = 'style.css';
  gulp.src( base.sass )
    .pipe( sass() )
    .pipe( mediaQuery() )
    .pipe( autoprefixer() )
    .pipe( $if( production, cssnano({
            autoprefixer: { add: true }
          }) ) )
    .pipe( rename(name) )
    .pipe( gulp.dest( dest.css ) )                            
});


/**
 * BROWSERIFY
 *
 */
/** Browserify Bundler */
var b = function() {
  return browserify({
    entries: [base.scripts, enter + '/scripts/dr-cookie-track.js', enter + '/scripts/dr-form-processor.js'],
    debug: true,
    cache: {},
    paths: ['./node_modules']
  }).transform('babelify', {
    'presets': ['es2015', 'es2016']
  });
};

/** Watchify Bundler */
var w = watchify(b());

/**
 * Process Bundler
 *
 * Pass either a build or watchify bundler
 */
function bundle(pkg) {
  return pkg.bundle()
    .pipe( source('scripts-min.js') )
    .pipe( buffer() )
    .pipe( $if( !production, sourcemaps.init( {loadMaps: true} ) ) )
    .pipe( $if( production, uglify({ 
	  	mangle: {reserved: ['$']},
	  	compress:{
		  	dead_code: false,
		  	drop_console: false,
		  	hoist_funs: true,
		  	keep_fargs: false,
		  	unused: false
	  	}})
	  	)
	  )
    .pipe( $if( !production, sourcemaps.write('.') ) )
    .pipe( gulp.dest(dest.scripts) );
}



/**
 * BROWSERIFY/JAVASCRIPT TASKS
 *
 * Build bundle (once and done)
 * Watch bundle (enable watchify)
 */
gulp.task('build_bundle', function() {
  return bundle(b());
});

gulp.task('watch_bundle', function() {
  bundle(w);
  w.on('update', bundle.bind(null, w) );
});



/**
 * IMAGE TASK
 *
 * Process images in src folder, move to dist folder
 */
gulp.task('process_images', function () {
  return gulp.src( base.img )
  	.pipe(changed(dest.img))
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [
          {removeViewBox: false},
          {cleanupIDs: false}
      ],
      use: [pngquant()]
    }))
    .pipe(gulp.dest(dest.img));
});



/**
 * SERVE TASK
 * --------------------------------------------------------
 * watch for file changes
 */
gulp.task('serve', ['watch_bundle'], function(){
  // Watch tasks
  //gulp.watch([enter + 'stylesheets/**/*.scss', enter + 'stylesheets/*.scss'], ['process_sass']);
  //gulp.watch([base.scripts], ['process_js']);
  gulp.watch([base.img], ['process_images']);
});


gulp.task('default', sequence('build_bundle','process_images'));
