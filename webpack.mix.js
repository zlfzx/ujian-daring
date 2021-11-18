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

// mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
//     require('postcss-import'),
//     require('tailwindcss'),
//     require('autoprefixer'),
// ]);

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

// Paket Soal
mix.js(resource + 'admin/paket_soal.js', 'public/js/admin/paket_soal.js')

// Soal
mix.js(resource + 'admin/soal.js', 'public/js/admin/soal.js')
mix.js(resource + 'admin/soal_create.js', 'public/js/admin/soal_create.js')

// Ujian
mix.js(resource + 'admin/ujian.js', 'public/js/admin/ujian.js');
mix.js(resource + 'admin/riwayat_ujian.js', 'public/js/admin/riwayat_ujian.js');
mix.js(resource + 'admin/riwayat_ujian_hasil.js', 'public/js/admin/riwayat_ujian_hasil.js');


// ================ //
// User
mix.js(resource + 'daftar_ujian.js', 'public/js/daftar_ujian.js');
mix.js(resource + 'ujian.js', 'public/js/ujian.js');
