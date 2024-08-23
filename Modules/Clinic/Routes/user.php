<?php
Route::get('/coach/create','CoachController@create')->name('coach.create');
Route::post('/coach','CoachController@store')->name('coach.store');

//Settings
Route::get('/coach/setting','Coach\\CoachSettingController@index')->name('coach.setting');
Route::post('/coach/setting','Coach\\CoachSettingController@update')->name('coach.setting.update');

//Booking
Route::get('/booking','Coach\\BookingController@index')->name('booking.all');
Route::post('/booking','Coach\\BookingController@store')->name('booking.store');
Route::delete('/booking/{booking}','Coach\\BookingController@destroy')->name('booking.destroy');
