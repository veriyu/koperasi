<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {

    // return view('welcome');
    return view('auth.login');
});

// must included
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('logout', 'UserController@logout');

// MoDULE MASTER
Route::get('module', 'Master\ModuleController@index')->name('index.module');
Route::get('module/update/{id?}', 'Master\ModuleController@showdata')->name('update.module');
Route::get('module/create','Master\ModuleController@create')->name('create.module');
// route untuk ajax
Route::get('deleteModule/{id?}', 'Master\ModuleController@delete');
Route::post('module/save','Master\ModuleController@save')->name('save.module');
// MoDULE MASTER





// Module Upload

Route::get('upload', 'Upload\UploadController@index');
Route::post('upload_file','Upload\UploadController@upload');

// Module Upload


// MODULE Anggota
Route::get('anggota', 'Anggota\AnggotaController@index')->name('index.anggota');
Route::get('update/anggota/{id?}', 'Anggota\AnggotaController@showdata')->name('update.anggota');
Route::get('tambah/anggota','Anggota\AnggotaController@create')->name('create.anggota');
// route untuk ajax
Route::get('deleteAnggota/{id?}', 'Anggota\AnggotaController@delete');
Route::post('simpan/anggota','Anggota\AnggotaController@save')->name('save.anggota');
// MODULE Anggota