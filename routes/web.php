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

Route::get('/manager', function () {
    return view('/manager/dashboard_manager');
});
Route::get('/manager/daftar_tugas', 'TugasController@daftarTugas');
Route::get('/manager/daftar_ruang', 'RuangController@index');
Route::get('/manager/daftar_cs', 'CSController@index');

// Route::get('/dashboard_manager/daftar_tugas/laporan/pdf_laporan', function () {
//     return view('/manajer/pdf_laporan');
// });

// Route::get('/dashboard_manager/daftar_cs', function () {
//     return view('/manajer/daftar_cs');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


