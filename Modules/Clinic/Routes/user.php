<?php
Route::get('/coach/create','CoachController@create')->name('coach.create');
Route::post('/coach','CoachController@store')->name('coach.store');

//Settings
Route::get('/coach/setting','Coach\\CoachSettingController@index')->name('coach.setting');
Route::post('/coach/setting','Coach\\CoachSettingController@update')->name('coach.setting.update');

//Booking
Route::prefix('booking')->name('booking.')->group(function() {

    Route::get('/','Coach\\BookingController@index')->name('all');
    Route::post('/','Coach\\BookingController@store')->name('store');
    Route::delete('/{booking}','Coach\\BookingController@destroy')->name('destroy');
    Route::patch('/{booking}/statusAfterReserve','Coach\\BookingController@statusAfterReserve')->name('statusAfterReserve');
    Route::patch('/{booking}/cancelCoach','Coach\\BookingController@cancelCoach')->name('cancel');
    Route::patch('/{booking}/assignment','Coach\\BookingController@assignment')->name('assignment');
    Route::get('/reserves','Coach\\BookingController@reserves')->name('reserves');

});


//Reserve USER
Route::prefix('user/reserve')->group(function() {
    Route::get('/', 'ReserveController@index')->name('reserves');
    Route::post('/{Reserve}/ignore','ReserveController@ignoreUser')->name('reserve.ignore');
    Route::patch('/{Reserve}/cancel','ReserveController@cancelUser')->name('reserve.cancel');
});
