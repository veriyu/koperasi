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
// route untuk ajax get
Route::get('deleteModule/{id?}', 'Master\ModuleController@delete');
Route::post('module/save','Master\ModuleController@save')->name('save.module');
// MoDULE MASTER

// Module Upload
// Route::get('upload', 'Upload\UploadController@index');
// Route::post('upload_file','Upload\UploadController@upload');
// Module Upload

/*
MODULE Anggota
*/
	Route::get('anggota', 'Anggota\AnggotaController@index')->name('index.anggota');
	Route::get('update/anggota/{id?}', 'Anggota\AnggotaController@showdata')->name('update.anggota');
	Route::get('tambah/anggota','Anggota\AnggotaController@create')->name('create.anggota');
	Route::get('cari/anggota','Anggota\AnggotaController@search')->name('search.anggota');
	// route untuk ajax get
	Route::get('deleteAnggota/{id?}', 'Anggota\AnggotaController@delete');
	Route::post('simpan/anggota','Anggota\AnggotaController@save')->name('save.anggota');
/*
MODULE Anggota
*/

// MODULE Setoran
	Route::get('setoran', 'Transaction\SetoranController@index')->name('index.setoran');
	Route::get('update/setoran/{id?}', 'Transaction\SetoranController@showdata')->name('update.setoran');
	Route::get('tambah/setoran','Transaction\SetoranController@create')->name('create.setoran');
	// route untuk ajax get
	Route::get('deleteSetoran/{id?}', 'Transaction\SetoranController@delete');
	Route::get('dataAnggota/{id?}', 'Transaction\SetoranController@anggota');
	Route::post('simpan/setoran','Transaction\SetoranController@save')->name('save.setoran');
// MODULE Setoran

// MODULE Pengeluaran
	Route::get('pengeluaran', 'Transaction\PengeluaranController@index')->name('index.pengeluaran');
	Route::get('update/pengeluaran/{id?}', 'Transaction\PengeluaranController@showdata')->name('update.pengeluaran');
	Route::get('tambah/pengeluaran','Transaction\PengeluaranController@create')->name('create.pengeluaran');
	// route untuk ajax get
	Route::get('deletepengeluaran/{id?}', 'Transaction\PengeluaranController@delete');
	Route::post('simpan/pengeluaran','Transaction\PengeluaranController@save')->name('save.pengeluaran');
// MODULE Pengeluaran

// MODULE Laporan Jurnal
	Route::get('jurnal', 'Laporan\JurnalController@index')->name('index.jurnal');
	// Route::get('update/jurnal/{id?}', 'Laporan\JurnalController@showdata')->name('update.jurnal');
	Route::get('laporan/jurnal', 'Laporan\JurnalController@showdata')->name('show.jurnal');
	Route::get('tambah/jurnal','Laporan\JurnalController@create')->name('create.jurnal');
	// route untuk ajax get
	Route::get('deletejurnal/{id?}', 'Laporan\JurnalController@delete');
	Route::post('simpan/jurnal','Laporan\JurnalController@save')->name('save.jurnal');
// MODULE Laporan Jurnal

// MODULE Laporan Buku Besar
	Route::get('bukubesar', 'Laporan\BukubesarController@index')->name('index.bukubesar');
	Route::get('laporan/bukubesar', 'Laporan\BukubesarController@showdata')->name('show.bukubesar');
// MODULE Laporan Buku Besar

// MODULE USER
	Route::get('user', 'UserController@index')->name('index.user');
	Route::get('update/user/{id?}', 'UserController@showdata')->name('update.user');
	Route::get('tambah/user','UserController@create')->name('create.user');
	// route untuk ajax get
	Route::get('deleteUser/{id?}', 'UserController@delete');
	Route::post('simpan/user','UserController@save')->name('save.user');
// MODULE USER

// MODULE UPLOAD
	Route::get('upload', 'Upload\UploadController@index')->name('index.upload');
	Route::get('update/upload/{id?}', 'Upload\UploadController@showdata')->name('update.upload');
	Route::get('tambah/upload','Upload\UploadController@create')->name('create.upload');
	// route untuk ajax get get
	Route::get('deleteupload/{id?}', 'Upload\UploadController@delete');
	Route::post('data/upload','Upload\UploadController@upload')->name('data.upload');
// MODULE UPLOAD