<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index');


Auth::routes();

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        // 
        Route::get('/', 'AdminController@index');
        Route::get('/aduan_count', 'AdminController@aduan_count');
        Route::get('/aduan_alert', 'AdminController@data_aduan_alert');
        // Pengaduan
        Route::get('/pengaduan', 'AdminController@pengaduan');
        Route::get('/pengaduan/detail/{aduan}', 'AdminController@detail_aduan');
        Route::get('/pengaduan/cetak/{aduan}', 'AdminController@cetak_aduan');
        // Tanggapan
        Route::get('/tanggapan/cetak/{tanggapan}', 'AdminController@cetak_tanggapan');
        Route::resource('/tanggapan', 'TanggapanController');
        // User
        Route::get('/masyarakat/cetak', 'AdminController@cetak_msy');
        Route::get('/petugas/cetak', 'AdminController@cetak_pgs');
        Route::get('/{user}/user', 'UsersController@index');
        Route::get('/{level}/user/{user}/edit', 'UsersController@edit');
        Route::get('/{user}/user', 'UsersController@index');
        Route::resource('/user', 'UsersController');
        // profil
        Route::get('/profil', 'AdminController@profil');
        Route::patch('/edit_profil/{user}', 'AdminController@edit_profil');
    });

Route::prefix('masyarakat')
    ->middleware(['auth', 'public'])
    ->group(function() {
        Route::get('/', 'PublicController@index');
        Route::get('/buat_aduan', 'PengaduanController@create');
        Route::get('/pengaduan/data_ped', 'PengaduanController@data_ped');
        Route::resource('/pengaduan', 'PengaduanController');
        Route::get('/profil', 'PublicController@profil');
        Route::patch('/edit_profil/{user}', 'PublicController@edit_profil');
    });

