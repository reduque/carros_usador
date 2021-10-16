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
mix.js('resources/js/front.js', 'public/js/app2021.js')
    .sass('resources/sass/front.scss', 'public/css/app.css')
    .version()
    .options({
        processCssUrls: false
    })
    .browserSync('goliiiveprod.local'); // Use wamp/xamp local proxy

