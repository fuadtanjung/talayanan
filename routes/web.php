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
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'HomeController@index')->name('home');
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'DiajukanController@index');
        Route::get('data', 'DiajukanController@ajaxTable');
        Route::post('edit/{id}', 'DiajukanController@edit');
        Route::post('change/{id}', 'DiajukanController@changeStatus');
        Route::post('delete/{id}', 'DiajukanController@delete');
    });

    Route::group(['prefix' => 'list'], function () {
        Route::get('tipe', 'ListController@listTipe');
        Route::get('kategori', 'ListController@listKategori');
        Route::get('user', 'ListController@listUser');
        Route::get('jenis', 'ListController@listJenis');
        Route::get('urgensi', 'ListController@listUrgensi');
        Route::get('dampak', 'ListController@listDampak');
        Route::get('prioritas', 'ListController@listPrioritas');
        Route::get('petugas', 'ListController@listPetugas');
    });

    Route::group(['prefix' => 'proses'], function () {
        Route::get('/', 'DiprosesController@index');
        Route::get('data', 'DiprosesController@ajaxTable');
        Route::post('edit/{id}', 'DiprosesController@edit');
        Route::post('delete/{id}', 'DiprosesController@delete');
    });

    Route::group(['prefix' => 'selesai'], function () {
        Route::get('/', 'DirekapController@index');
        Route::get('data', 'DirekapController@ajaxTable');
        Route::post('input', 'DirekapController@input');
        Route::post('edit/{id}', 'DirekapController@edit');
        Route::post('delete/{id}', 'DirekapController@delete');
        Route::get('print/{id}', 'DirekapController@laporan');
        Route::post('filter', 'DirekapController@semua');
    });

    Route::group(['prefix' => 'dampak'], function(){
        Route::get('/','DampakController@index');
        Route::get('data', 'DampakController@ajaxTable');
        Route::post('input','DampakController@input');
        Route::post('edit/{id}', 'DampakController@edit');
        Route::post('delete/{id}', 'DampakController@delete');
    });

    Route::group(['prefix' => 'user'], function(){
        Route::get('/','UserController@index');
        Route::get('data', 'UserController@ajaxTable');
        Route::post('input','UserController@input');
        Route::post('edit/{id}', 'UserController@edit');
        Route::post('delete/{id}', 'UserController@delete');
    });

   Route::group(['prefix' => 'jenis'], function(){
        Route::get('/','JenisController@index');
        Route::get('data', 'JenisController@ajaxTable');
        Route::post('input','JenisController@input');
        Route::post('edit/{id}', 'JenisController@edit');
        Route::post('delete/{id}', 'JenisController@delete');
    });

   Route::group(['prefix' => 'petugas'], function(){
        Route::get('/','PetugasController@index');
        Route::get('data', 'PetugasController@ajaxTable');
        Route::post('input','PetugasController@input');
        Route::post('edit/{id}', 'PetugasController@edit');
        Route::post('delete/{id}', 'PetugasController@delete');
    });

   Route::group(['prefix' => 'urgensi'], function(){
        Route::get('/','UrgensiController@index');
        Route::get('data', 'UrgensiController@ajaxTable');
        Route::post('input','UrgensiController@input');
        Route::post('edit/{id}', 'UrgensiController@edit');
        Route::post('delete/{id}', 'UrgensiController@delete');
    });

   Route::group(['prefix' => 'prioritas'], function(){
        Route::get('/','PrioritasController@index');
        Route::get('data', 'PrioritasController@ajaxTable');
        Route::post('input','PrioritasController@input');
        Route::post('edit/{id}', 'PrioritasController@edit');
        Route::post('delete/{id}', 'PrioritasController@delete');
    });

    Route::group(['prefix' => 'tipe'], function(){
        Route::get('/','TipeController@index');
        Route::get('data', 'TipeController@ajaxTable');
        Route::post('input','TipeController@input');
        Route::post('edit/{id}', 'TipeController@edit');
        Route::post('delete/{id}', 'TipeController@delete');
    });

    Route::group(['prefix' => 'kategori'], function(){
        Route::get('/','KategoriController@index');
        Route::get('data', 'KategoriController@ajaxTable');
        Route::post('input','KategoriController@input');
        Route::post('edit/{id}', 'KategoriController@edit');
        Route::post('delete/{id}', 'KategoriController@delete');
    });
});
