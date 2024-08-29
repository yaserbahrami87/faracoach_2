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

    Route::get('/coach/{user}','CoachController@show')->name('coach.show');
    Route::get('/coach/{user}/bookings','BookingController@ajaxShowBookings');

});

Route::namespace('\\Modules\\Clinic\\Http\\Livewire\\')->prefix('clinic')->name('clinic.')->group(function() {
    Route::get('/', Coaches::class)->name('coaches');
//    Route::get('/coach/{user}',CoachSingle::class)->name('coach.show');
});


