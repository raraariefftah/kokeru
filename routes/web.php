<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'TugasController@index');

Route::get('/pop', function () {
    return view('pop');
});

Route::get('/customer_service', function () {
    return view('/cs/dashboard_cs');
});

Route::get('/manager', function () {
    return view('/manager/dashboard');
});

Route::get('/manager/daftar_tugas', 'TugasController@daftarTugas');
Route::get('/manager/daftar_ruang', 'RuangController@index')->name('daftar_ruang');
Route::get('/manager/daftar_cs', 'CSController@index')->name('daftar_cs');
Route::get('/manager/tambah_data_cs', 'CSController@create')->name('tambah_data_cs');
Route::get('/manager/tambah_ruang', 'RuangController@create')->name('tambah_ruang');
Route::post('/manager/store_data_cs', 'CSController@store')->name('cs_store');
Route::post('/manager/store_data_ruang', 'RuangController@store')->name('ruang_store');
Route::get('/manager/edit_data_cs/{id}', 'CSController@edit')->name('edit_data_cs');
Route::get('/manager/edit_ruang/{id}', 'RuangController@edit')->name('edit_ruang');
Route::patch('/manager/update_data_cs/{id}', 'CSController@update');
Route::patch('/manager/update_ruang/{id}', 'RuangController@update');
Route::delete('manager/delete_data_cs/{id}', 'CSController@destroy');

// Route::get('/dashboard_manager/daftar_tugas/laporan/pdf_laporan', function () {
//     return view('/manajer/pdf_laporan');
// });

// Route::get('/dashboard_manager/daftar_cs', function () {
//     return view('/manajer/daftar_cs');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


