const mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');


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

mix.js('resources/js/app.js', 'public/js')
    // .postCss('resources/css/app.css', 'public/css', [
        //
    // ])
    .sass('resources/css/app.scss', 'public/css');


mix.browserSync({
    proxy: 'localhost:8000', // Укажите ваш домен или IP
    files: [
        'resources/views/**/*',
        'resources/css/**/*',
        'public/css/**/*',
        'public/js/**/*',
    ],
});
