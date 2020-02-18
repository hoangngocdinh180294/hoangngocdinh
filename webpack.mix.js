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

mix.copyDirectory('resources/themes/mspace', 'public/themes/mspace');
// mix.styles([
//     'resources/themes/mspace/js/mainmenu/menu.css',
//     'resources/themes/mspace/css/default.css',
//     'resources/themes/mspace/css/layouts.css',
//     'resources/themes/mspace/css/shortcodes.css',
//     'resources/themes/mspace/css/responsive-leyouts.css',
//     'resources/themes/mspace/css/et-line-font/et-line-font.css',
//     'resources/themes/mspace/js/jFlickrFeed/style.css',
//     'resources/themes/mspace/js/smart-forms/smart-forms.css',
//     'resources/themes/mspace/css/colors/mspace.css',
// ], 'public/themes/mspace/css/all.css');

// mix.js('resources/themes/mspace/js/main.js', 'public/themes/mspace/js')
//    .sass('resources/themes/mspace/sass/app.scss', 'public/themes/mspace/css')
//    .version();
