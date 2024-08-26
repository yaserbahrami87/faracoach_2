<?php

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

Route::prefix('event')->name('event.')->group(function() {
    Route::get('/all', 'EventController@index')->name('all');
    Route::get('/{Event}', 'EventController@show')->name('show');
});
