<?php

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

Route::get('/', 'Auth\LoginController@index');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::post('/bayar/cari', 'PembayaranController@cari')->name('bayar.cari');
Route::get('/bayar', 'PembayaranController@index')->name('bayar.index');

Route::group(['middleware' => 'checkAdmin'], function () {
    Route::resource('siswa', 'SiswaController');
    Route::resource('kelas', 'KelasController');
    Route::resource('spp', 'SppController');
    Route::resource('petugas', 'PetugasController');
    Route::get('/generate', 'PembayaranController@generate')->name('generate');
});

Route::group(['middleware' => 'checkPetugas'], function () {
    Route::get('/bayar/create', 'PembayaranController@create')->name('bayar.create');
    Route::post('/bayar/store', 'PembayaranController@store')->name('bayar.store');
});
