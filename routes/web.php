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

//Route::get('/', function () {
//    return view('awal');
//});

Route::get('/pop', function () {
    return view('pop');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard_admin', function () {
    return view('admin.dashboard_admin');
});

Route::get('/dashboard_manager', function () {
    return view('manajer.dashboard_manager');
});

Route::get('/dashboard_cs', function () {
    return view('cs.dashboard_cs');
});
Route::get('/', 'HomeController@index')->name('home');
