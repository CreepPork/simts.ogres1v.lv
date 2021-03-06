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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/pages/index.js', 'public/js/pages')
    .js('resources/assets/js/pages/recommend.js', 'public/js/pages')
    .js('resources/assets/js/pages/work.js', 'public/js/pages')
    .js('resources/assets/js/pages/indexAdmin.js', 'public/js/pages')
    .js('resources/assets/js/pages/gift.js', 'public/js/pages')
    .js('resources/assets/js/pages/event.js', 'public/js/pages')
    .js('resources/assets/js/helpers/deleteModal.js', 'public/js/helpers')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copyDirectory('resources/assets/images/', 'public/images')
    .browserSync('simts.test');
