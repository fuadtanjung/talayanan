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

Route::get('/', 'TambahPengaduanController@index');
Route::post('/input', 'TambahPengaduanController@input')->name('tambahpengaduan');

Route::get('/masuk','LoginController@index')->name('login.index');
Route::post('login','LoginController@postlogin')->name('login.postlogin');
Route::get('logout','LoginController@logout')->name('login.logout');


Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('home', 'HomeController@index')->name('home');
    });

    Route::group(['prefix' => 'dampak'], function(){
        Route::get('/','DampakController@index');
        Route::get('data', 'DampakController@ajaxTable');
        Route::post('input','DampakController@input');
        Route::post('edit/{id}', 'DampakController@edit');
        Route::post('delete/{id}', 'DampakController@delete');
    });
});
