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

// Pemenang
Route::get('/juara','IndexController@juara');

Auth::routes();

/* Admin */
Route::get('admin/dashboard', 'HomeController@admin')->middleware('role:admin')->name('admin.page');
Route::resource('admin/juara','JuaraController')->middleware('role:admin');
Route::resource('admin/jadwal','JadwalController')->middleware('role:admin');
Route::get('admin/sumbang-saran/export-pdf', 'SumbangSaranController@export_pdf')->middleware('role:admin');
Route::get('admin/sumbang-saran/export-excel', 'SumbangSaranController@export_excel')->middleware('role:admin');
Route::delete('admin/sumbang-saran/delete-all', 'SumbangSaranController@deleteall')->middleware('role:admin');
Route::resource('admin/sumbang-saran', 'SumbangSaranController')->middleware('role:admin');
Route::get('admin/karyawan/export-pdf', 'KaryawanController@export_pdf')->middleware('role:admin');
Route::get('admin/karyawan/export-excel', 'KaryawanController@export_excel')->middleware('role:admin');
Route::resource('admin/karyawan','KaryawanController')->middleware('role:admin');
Route::resource('admin/user', 'UserController')->middleware('role:admin');
Route::resource('admin/bagian', 'BagianController')->middleware('role:admin');
Route::resource('admin/sub-bagian', 'Sub_BagianController')->middleware('role:admin');
Route::resource('admin/status', 'StatusController')->middleware('role:admin');

/* Penilai */
Route::get('penilai/dashboard', 'HomeController@penilai')->middleware('role:penilai')->name('penilai.page');;
Route::get('penilai/penilaian/export-pdf','PenilaianController@export_pdf')->middleware('role:penilai');
Route::get('penilai/penilaian/export-excel','PenilaianController@export_excel')->middleware('role:penilai');
Route::resource('penilai/penilaian','PenilaianController')->middleware('role:penilai');
Route::get('penilai/finalis/export-pdf','FinalisController@export_pdf')->middleware('role:penilai');
Route::get('penilai/finalis/export-excel','FinalisController@export_excel')->middleware('role:penilai');
Route::resource('penilai/finalis','FinalisController')->middleware('role:penilai');
