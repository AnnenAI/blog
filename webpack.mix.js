const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.autoload({
     jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
 });

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/postTags.js', 'public/js');
