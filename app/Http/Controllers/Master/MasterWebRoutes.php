
// MODULE {ModuleName}
Route::get('{ModuleRoute}', '{ModuleName}\{ModuleName}Controller@index');
Route::get('update{ModuleName}/{id?}', '{ModuleName}\{ModuleName}Controller@showdata');
Route::get('tambah{ModuleName}','{ModuleName}\{ModuleName}Controller@create');
Route::get('hapus{ModuleName}/{id?}', '{ModuleName}\{ModuleName}Controller@delete');
Route::post('simpan{ModuleName}','{ModuleName}\{ModuleName}Controller@save');
// MODULE {ModuleName}