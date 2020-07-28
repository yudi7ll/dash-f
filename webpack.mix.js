const mix = require('laravel-mix');

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

mix
    .js('resources/js/app', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    // custom
    .js('resources/js/infinite-scroll', 'public/js')
    .sass('resources/sass/userinfo.scss', 'public/css')
    //highlight
    .js('resources/js/highlight', 'public/js')
    .styles('node_modules/highlight.js/styles/pojoaque.css', 'public/css/highlight.css')
    .copy('node_modules/highlight.js/styles/pojoaque.jpg', 'public/css')
    // create-form
    .styles([
        'node_modules/simplemde/dist/simplemde.min.css',
        'node_modules/selectize/dist/css/selectize.bootstrap3.css',
    ], 'public/css/create-form.css')
    .js('resources/js/create-form', 'public/js')
    .browserSync('0.0.0.0');
