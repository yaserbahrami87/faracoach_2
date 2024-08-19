<?php
Route::get('/profile','UserController@profile')->name('profile.show');
Route::patch('/profile','UserController@update')->name('profile.update');
Route::get('/','PanelController@index')->name('home');
