<?php
Route::get('/coach/create','CoachController@create')->name('coach.create');
Route::post('/coach','CoachController@store')->name('coach.store');

//Settings
Route::get('/coach/setting','Coach\\CoachSettingController@index')->name('coach.setting');
Route::post('/coach/setting','Coach\\CoachSettingController@update')->name('coach.setting.update');

//Booking
//Route::get('/booking','')
