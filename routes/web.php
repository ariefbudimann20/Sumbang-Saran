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
Route::get('/', function () {
    return view('index');
}); 
Route::resource('/input', 'InputController');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->middleware('auth');
Route::resource('sumbang-saran', 'SumbangSaranController')->middleware('auth');
Route::resource('karyawan','KaryawanController')->middleware('auth');
Route::resource('penilaian','PenilaianController')->middleware('auth');
Route::resource('peserta-terbaik','PesertaTerbaikController')->middleware('auth');
Route::resource('jadwal','JadwalController')->middleware('auth');
