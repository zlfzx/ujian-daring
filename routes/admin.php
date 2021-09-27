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

Route::get('/', 'DashboardController@index');

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
Route::apiResource('mapel', 'Mapel\MapelController');
