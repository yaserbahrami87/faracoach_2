<?php
Route::get('/coach/create','CoachController@create')->name('coach.create');
Route::post('/coach','CoachController@store')->name('coach.store');
