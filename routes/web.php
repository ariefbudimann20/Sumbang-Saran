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
Route::get('/','IndexController@index');
// Route::post('input/fetch','InputController@fetch')->name('option.fetch');
Route::get('input', 'InputController@index')->middleware('role:user')->name('user.page');
Route::get('ajax-sub','InputController@search');
Route::post('input','InputController@store');

Auth::routes();

/* Admin */
Route::get('admin/dashboard', 'HomeController@admin')->middleware('role:admin')->name('admin.page');
Route::resource('admin/jadwal','JadwalController')->middleware('role:admin');
Route::resource('admin/sumbang-saran', 'SumbangSaranController')->middleware('role:admin');
Route::resource('admin/karyawan','KaryawanController')->middleware('role:admin');
Route::resource('admin/user', 'UserController')->middleware('role:admin');
Route::resource('admin/bagian', 'BagianController')->middleware('role:admin');
Route::resource('admin/sub-bagian', 'Sub_BagianController')->middleware('role:admin');
Route::resource('admin/status', 'StatusController')->middleware('role:admin');

/* Penilai */
Route::get('penilai/dashboard', 'HomeController@penilai')->middleware('role:penilai')->name('penilai.page');;
Route::resource('penilai/penilaian','PenilaianController')->middleware('role:penilai');
Route::resource('penilai/finalis','FinalisController')->middleware('role:penilai');
