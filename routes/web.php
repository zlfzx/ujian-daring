<?php

use App\Http\Controllers\DaftarUjianController;
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

// Auth
Route::get('login', 'AuthController@index')->name('login');
Route::post('login', 'AuthController@login')->name('login.post');

Route::group(['middleware' => ['auth:siswa']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // daftar ujian
    Route::group(['prefix' => 'daftar-ujian'], function () {
        Route::get('/', 'DaftarUjianController@index')->name('daftar-ujian');
        Route::post('data', 'DaftarUjianController@data')->name('daftar-ujian.data');
        Route::post('{ujian}', 'DaftarUjianController@show')->name('daftar-ujan.show');
    });

    // riwayat ujian
    Route::group(['prefix' => 'riwayat-ujian'], function () {
        Route::get('/', 'RiwayatUjianController@index')->name('riwayat-ujian');
        Route::get('data', 'RiwayatUjianController@data')->name('riwayat-ujian.data');
    });

    // Ujian
    Route::group(['prefix' => 'ujian'], function () {
        Route::get('/', 'UjianController@index')->name('ujian');
        Route::post('mulai', 'UjianController@mulai')->name('ujian.mulai');
        Route::get('soal', 'UjianController@soal')->name('ujian.soal');
        Route::get('daftar-soal', 'UjianController@daftarSoal')->name('ujian.daftar-soal');

        Route::post('ragu-ragu', 'UjianController@raguRagu')->name('ujian.ragu-ragu');
        Route::post('simpan-jawaban', 'UjianController@simpanJawaban')->name('ujian.simpan-jawaban');
        Route::post('selesai', 'UjianController@selesai')->name('ujian.selesai');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');


    // logout
    Route::match(['get', 'post'], 'logout', 'AuthController@logout')->name('logout');
});

// require __DIR__.'/auth.php';
