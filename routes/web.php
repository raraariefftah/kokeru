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

Route::get('/dashboard', function () {
    return view('/manajer/dashboard_manager');
});

// Route::get('/dashboard_manager/daftar_tugas/laporan/pdf_laporan', function () {
//     return view('/manajer/pdf_laporan');
// });

// Route::get('/dashboard_manager/daftar_cs', function () {
//     return view('/manajer/daftar_cs');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


