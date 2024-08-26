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

Route::prefix('clinic')->name('clinic.')->group(function() {

    //Route::get('/', 'CoachController@index')->name('coaches');
    //Route::get('/', \App\Http\Livewire\Clinic\Coaches::class)->name('coaches');

    //Clinic
    //Route::get('coaches','CoachController@index')->name('coaches');
    Route::get('coach/{User}','CoachController@show')->name('coach.show');
});

Route::namespace('\\Modules\\Clinic\\Http\\Livewire\\')->prefix('clinic')->name('clinic.')->group(function() {
    Route::get('/', Coaches::class)->name('coaches');
});


