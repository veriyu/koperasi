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

Route::group(['middleware' => 'auth'], function () {

	Route::get('/home', 'HomeController@index');

	//MODULE Anggota
	Route::get('anggota', 'Anggota\AnggotaController@index')->name('index.anggota');
	Route::get('update/anggota/{id?}', 'Anggota\AnggotaController@showdata')->name('update.anggota');
	Route::get('tambah/anggota','Anggota\AnggotaController@create')->name('create.anggota');
	Route::get('cari/anggota','Anggota\AnggotaController@search')->name('search.anggota');
	// route untuk ajax get
	Route::get('deleteAnggota/{id?}', 'Anggota\AnggotaController@delete');
	Route::post('simpan/anggota','Anggota\AnggotaController@save')->name('save.anggota');
	// MODULE Anggota


	// MODULE Akun
	Route::get('akun', 'Akun\AkunController@index')->name('index.akun');
	Route::get('update/akun/{id?}', 'Akun\AkunController@showdata')->name('update.akun');
	Route::get('tambah/akun','Akun\AkunController@create')->name('create.akun');
	Route::get('cari/akun','Akun\AkunController@search')->name('search.akun');
	// route untuk ajax get
	Route::get('deleteAkun/{id?}', 'Akun\AkunController@delete');
	Route::post('simpan/akun','Akun\AkunController@save')->name('save.akun');
	// MODULE Akun

	// MODULE Setoran
	Route::get('setoran', 'Transaction\SetoranController@index')->name('index.setoran');
	Route::get('update/setoran/{id?}', 'Transaction\SetoranController@showdata')->name('update.setoran');
	Route::get('tambah/setoran','Transaction\SetoranController@create')->name('create.setoran');
	// route untuk ajax get
	Route::get('deleteSetoran/{id?}', 'Transaction\SetoranController@delete');
	Route::get('dataAnggota/{id?}', 'Transaction\SetoranController@anggota');
	Route::post('simpan/setoran','Transaction\SetoranController@save')->name('save.setoran');
	// MODULE Setoran

	// MODULE Pinjaman
	Route::get('pinjaman', 'Transaction\PinjamanController@index')->name('index.pinjaman');
	Route::get('update/pinjaman/{id?}', 'Transaction\PinjamanController@showdata')->name('update.pinjaman');
	Route::get('tambah/pinjaman','Transaction\PinjamanController@create')->name('create.pinjaman');
	// route untuk ajax get
	Route::get('deletepinjaman/{id?}', 'Transaction\PinjamanController@delete');
	Route::post('simpan/pinjaman','Transaction\PinjamanController@save')->name('save.pinjaman');
	// MODULE Pinjaman

	// MODULE Laporan Jurnal
	Route::get('jurnal', 'Laporan\JurnalController@index')->name('index.jurnal');
	// Route::get('update/jurnal/{id?}', 'Laporan\JurnalController@showdata')->name('update.jurnal');
	Route::get('laporan/jurnal', 'Laporan\JurnalController@showdata')->name('show.jurnal');
	// MODULE Laporan Jurnal

	// MODULE Tutup Buku
	Route::get('tutupbuku', 'Tutupbuku\TutupbukuController@index')->name('index.tutupbuku');
	Route::post('simpan/tutupbuku','Tutupbuku\TutupbukuController@save')->name('save.tutupbuku');
	// MODULE Tutup Buku

	// MODULE SALDO AKUN
	Route::get('saldoakun', 'Laporan\SaldoakunController@index')->name('index.saldoakun');
	Route::get('laporan/saldoakun', 'Laporan\SaldoakunController@showdata')->name('show.saldoakun');
	Route::post('simpan/saldoakun','Laporan\SaldoakunController@save')->name('save.saldoakun');
	// MODULE SALDO AKUN

	// MODULE Laporan Buku Besar
	Route::get('bukubesar', 'Laporan\BukubesarController@index')->name('index.bukubesar');
	Route::get('laporan/bukubesar', 'Laporan\BukubesarController@showdata')->name('show.bukubesar');
	// Route::get('laporan/bukubesar', 'Laporan\BukubesarController@showdata')->name('save.bukubesar');
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
});