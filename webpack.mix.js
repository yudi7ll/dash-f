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

    // post-form
    .styles([
        'node_modules/simplemde/dist/simplemde.min.css',
        'node_modules/selectize/dist/css/selectize.bootstrap3.css',
    ], 'public/css/post-form.css')
    .js('resources/js/post-form', 'public/js')

    /**
     * @Pages
     */
    // userinfo page
    .sass('resources/sass/pages/userinfo.scss', 'public/css')
    // home page
    .js('resources/js/home', 'public/js')
    // user page
    .sass('resources/sass/pages/user-edit.scss', 'public/css')
    .js('resources/js/user-edit', 'public/js')
    .browserSync('0.0.0.0');
