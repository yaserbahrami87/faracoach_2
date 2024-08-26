<?php
Route::get('/', 'AdminController@index')->name('dashboard');

//users
Route::namespace('\\Modules\\Crm\\Http\\Livewire')->group(function()
{
    Route::get('/User/{User}/show',\Admin\Users\Profile::class)->name('user.profile');
    Route::get('/User/insert',\Admin\Users\InsertUser::class)->name('user.insert');
});

Route::prefix('User')->group(function()
{
    Route::get('/all','UserController@index')->name('users.all');
    Route::post('/{User}/login','UserController@loginWithUser')->name('user.loginWithUser');
    Route::get('/excel','UserController@createExcel')->name('user.excelCreate');
    Route::post('/excel','UserController@storeExcel')->name('user.excelStore');
});

//Setting
Route::prefix('setting')->group(function ()
{
    Route::get('/','Setting\\SettingController@index')->name('setting.all');
    Route::patch('/','Setting\\SettingController@update')->name('setting.update');

});

//Route::resource('User','UserController');


