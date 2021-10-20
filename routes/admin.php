<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@index')->name('admin.index');

// Kelas
Route::match(['get', 'post'], 'kelas/datatable', 'Kelas\KelasController@dataTable');
Route::match(['get', 'post'], 'kelas/select2', 'Kelas\KelasController@select2');
Route::apiResource('kelas', 'Kelas\KelasController', [
    'parameters' => [
        'kelas' => 'kelas'
    ]
]);

// Rombel
Route::match(['get', 'post'], 'rombel/datatable', 'Rombel\RombelController@dataTable');
Route::match(['get', 'post'], 'rombel/select2', 'Rombel\RombelController@select2');
Route::apiResource('rombel', 'Rombel\RombelController');

// Siswa
Route::match(['get', 'post'], 'siswa/datatable', 'Siswa\SiswaController@dataTable');
Route::apiResource('siswa', 'Siswa\SiswaController');

// Mapel
Route::match(['get', 'post'], 'mapel/datatable', 'Mapel\MapelController@dataTable');
Route::match(['get', 'post'], 'mapel/select2', 'Mapel\MapelController@select2');
Route::apiResource('mapel', 'Mapel\MapelController');


// Paket Soal
Route::match(['get', 'post'], 'paket-soal/datatable', 'PaketSoal\PaketSoalController@dataTable');
Route::match(['get', 'post'], 'paket-soal/select2', 'PaketSoal\PaketSoalController@select2');
Route::apiResource('paket-soal', 'PaketSoal\PaketSoalController');

// Soal
Route::match(['get', 'post'], 'soal/datatable', 'Soal\SoalController@dataTable');
// Route::match(['get', 'post'], 'soal/select2', 'Mapel\MapelController@select2');
Route::resource('soal', 'Soal\SoalController');

// Ujian
Route::resource('ujian', 'Ujian\UjianController');

// Pengaturan
Route::get('pengaturan', 'Pengaturan\PengaturanController@index')->name('pengaturan.index');
Route::post('pengaturan', 'Pengaturan\PengaturanController@update')->name('pengaturan.update');
Route::post('pengaturan/slug', 'Pengaturan\PengaturanController@updateSlug')->name('pengaturan.update-slug');
