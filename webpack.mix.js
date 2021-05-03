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

 mix.sourceMaps()
 .js('resources/js/app.js', 'public/js')
 .sass("resources/sass/styles.scss", "public/css")
 .copy("resources/images/background.jpg", "public/images")
 .copy("resources/images/homePage/**.*", "public/images")
 .copy("resources/images/calendarPage/smilingGirl.jpg", "public/images/calendarPage")
 .copy("resources/images/paymentPage/*.svg", "public/images/paymentPage");
