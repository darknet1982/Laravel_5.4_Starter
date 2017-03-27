const { mix } = require('laravel-mix');

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

mix.less('resources/assets/less/common/critical.less', 'public/css/common/critical.css');
mix.less('resources/assets/less/common/common.less', 'public/css/common/common.css');
mix.less('resources/assets/less/home/critical.less', 'public/css/home/critical.css');
mix.less('resources/assets/less/home/common.less', 'public/css/home/common.css');

mix.js('resources/assets/js/common.js', 'public/js/common.js');
mix.js('resources/assets/js/home.js', 'public/js/home.js');

mix.version();
