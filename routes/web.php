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
<<<<<<< HEAD
});

Route::resource('/input', 'IndexController');

=======
}); 

Route::resource('/input', 'IndexController');
// Route::get('/', function () {
//     return view('index');
// });
>>>>>>> 341efe9dcd5d5760571e64e33b8b0ed3b2f532b2

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::resource('sumbang-saran', 'SumbangSaranController');
