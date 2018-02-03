let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.scripts([
 	'resources/assets/js/jquery.js',
 	'resources/assets/js/bootstrap.js',
 	'resources/assets/js/code.js',
 	'resources/assets/js/grayscale.js',
 	'resources/assets/js/jquery.flexisel.js',
 	'resources/assets/js/toastr.js',
 	'resources/assets/js/imagesUpload.js',
 	'resources/assets/js/adminDesign.js',
  'resources/assets/js/select2.js',
 	'resources/assets/js/app.js',
  'resources/assets/js/country.js',
  'resources/assets/js/jPages.js',
  'resources/assets/js/pagination.js',
  'resources/assets/js/search.js',
  'resources/assets/js/weather.js',
  'resources/assets/js/bootstrap-clockpicker.min.js',
  'resources/assets/js/googleMap.js',
  'resources/assets/js/jssorslider.js',
  'resources/assets/js/parsley.min.js',
  'resources/assets/js/jssor.slider-26.7.0.min.js',  
  'resources/assets/js/clockpickerdefault.js',
 	], 'public/js/app.js')
 	.styles([
 	'resources/assets/css/bootstrap.css',
 	'resources/assets/css/toastr.css',
 	'resources/assets/css/code.css',
 	'resources/assets/css/grayscale.css',
  'resources/assets/css/select2.css',
  'resources/assets/css/adminCSS.css',
  'resources/assets/css/holder.css',
  'resources/assets/css/jssorslider.css',
  'resources/assets/css/bootstrap-clockpicker.min.css',
 	], 'public/css/app.css');
