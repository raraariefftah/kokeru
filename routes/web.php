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

Route::get('/customer_service', 'TugasController@show');
Route::get('/customer_service/edit_profil/{id}', 'CSController@edit_profil');
Route::patch('/customer_service/update_profil/{id}', 'CSController@update_profil');
Route::get('/customer_service/upload_bukti/{id}', 'TugasController@upload_bukti');
Route::patch('/customer_service/update_bukti/{id}', 'TugasController@update_bukti');

Route::get('/manager', 'ManagerController@index')->name('dashboard_manager');
Route::get('/manager/daftar_ruang', 'RuangController@index')->name('daftar_ruang');
Route::get('/manager/daftar_cs', 'CSController@index')->name('daftar_cs');
Route::get('/manager/tambah_data_cs', 'CSController@create')->name('tambah_data_cs');
Route::get('/manager/tambah_ruang', 'RuangController@create')->name('tambah_ruang');
Route::get('/manager/tambah_tugas', 'TugasController@create')->name('tambah_tugas');
Route::post('/manager/store_data_cs', 'CSController@store')->name('cs_store');
Route::post('/manager/store_data_ruang', 'RuangController@store')->name('ruang_store');
Route::post('/manager/store_data_tugas', 'TugasController@store')->name('tugas_store');
Route::get('/manager/edit_data_cs/{id}', 'CSController@edit')->name('edit_data_cs');
Route::get('/manager/edit_ruang/{id}', 'RuangController@edit')->name('edit_ruang');
Route::patch('/manager/update_data_cs/{id}', 'CSController@update');
Route::patch('/manager/update_ruang/{id}', 'RuangController@update');
Route::delete('manager/delete_data_cs/{id}', 'CSController@destroy');
Route::delete('manager/delete_ruang/{id}', 'RuangController@destroy');
Route::get('/manager/edit_profil/{id}', 'ManagerController@edit');
Route::patch('/manager/update_profil/{id}', 'ManagerController@update');
Route::get('/manager/ubah_password/{id}', 'ManagerController@ubahPassword');
Route::patch('/manager/update_password/{id}', 'ManagerController@updatePassword');
Route::patch('/manager/reset_password_cs/{id}', 'ManagerController@resetPasswordCS');
Route::get('/manager/laporan', 'TugasController@laporan');
Route::get('/manager/laporan_daftar_tugas', 'TugasController@laporan_daftar_tugas');
Route::get('/manager/print_laporan_pdf/{waktutugas}/{status}', 'TugasController@print_laporan_pdf');
Route::get('/manager/print_laporan_excel/{waktutugas}/{status}', 'TugasController@print_laporan_excel');

Route::patch('/reset_tugas', 'TugasController@reset_tugas');

// Route::get('/dashboard_manager/daftar_tugas/laporan/pdf_laporan', function () {
//     return view('/manajer/pdf_laporan');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


