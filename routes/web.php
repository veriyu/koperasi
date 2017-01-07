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

// MoDULE CHAT
Route::get('chat', 'Master\ChatController@index')->name('index.chat');
Route::get('messages', 'Master\ChatController@listMessages');
Route::get('test', 'Master\ChatController@test');
Route::post('messages', 'Master\ChatController@saveMessage');
// MoDULE CHAT

// /MoDULE POLIKLINIK

// KEGIATAN
Route::get('kegiatan', 'poliklinik\KegiatanController@index');
Route::get('update_kegiatan/{id?}', 'poliklinik\KegiatanController@showdata');
Route::get('tambah_kegiatan','poliklinik\KegiatanController@create');
Route::get('hapus_kegiatan/{id?}', 'poliklinik\KegiatanController@delete');
Route::post('simpan_kegiatan','poliklinik\KegiatanController@save');
// KEGIATAN

// PASIEN
Route::get('pasien', 'poliklinik\PasienController@index');
Route::get('update_pasien/{id?}', 'poliklinik\PasienController@showdata');
Route::get('tambah_pasien','poliklinik\PasienController@create');
Route::get('hapus_pasien/{id?}', 'poliklinik\PasienController@delete');
Route::post('simpan_pasien','poliklinik\PasienController@save');
// PASIEN

// OBAT
Route::get('obat', 'poliklinik\ObatController@index');
Route::get('update_obat/{id?}', 'poliklinik\ObatController@showdata');
Route::get('tambah_obat','poliklinik\ObatController@create');
Route::get('hapus_obat/{id?}', 'poliklinik\ObatController@delete');
Route::post('simpan_obat','poliklinik\ObatController@save');
// OBAT

// LAPORAN
Route::get('laporan_poliklinik_kegiatan', 'poliklinik\LaporankegiatanController@index');
Route::get('laporan_poliklinik_kegiatan_show', 'poliklinik\LaporankegiatanController@laporan');

// LAPORAN

// /MoDULE POLIKLINIK


// Module Upload

Route::get('upload', 'Upload\UploadController@index');
Route::post('upload_file','Upload\UploadController@upload');

// Module Upload



// MODULE Koperasi
Route::get('koperasi', 'Koperasi\KoperasiController@index');
Route::get('updateKoperasi/{id?}', 'Koperasi\KoperasiController@showdata');
Route::get('tambahKoperasi','Koperasi\KoperasiController@create');
Route::get('hapusKoperasi/{id?}', 'Koperasi\KoperasiController@delete');
Route::post('simpanKoperasi','Koperasi\KoperasiController@save');
// MODULE Koperasi