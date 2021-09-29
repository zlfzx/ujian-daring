const mix = require('laravel-mix');
const resource = 'resources/js/';

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

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

/*
 | Admin
*/

// Kelas
mix.js(resource + 'admin/kelas.js', 'public/js/admin/kelas.js');

// Rombel
mix.js(resource + 'admin/rombel.js', 'public/js/admin/rombel.js');

// Siswa
mix.js(resource + 'admin/siswa.js', 'public/js/admin/siswa.js');

// Mapel
mix.js(resource + 'admin/mapel.js', 'public/js/admin/mapel.js')
