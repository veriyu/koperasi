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

    return view('auth.login');
});

// must included
Auth::routes();


// Route::group(['middleware' => 'auth'], function () {


Route::get('/home', 'HomeController@index');
Route::get('logout', 'UserController@logout');


// MODULE
Route::get('module', 'Master\ModuleController@index');
Route::get('updateModule/{id?}', 'Master\ModuleController@showdata');
Route::get('tambahModule','Master\ModuleController@create');
Route::get('hapusModule/{id?}', 'Master\ModuleController@delete');
Route::post('simpanModule','Master\ModuleController@save');
// MODULE


// });
