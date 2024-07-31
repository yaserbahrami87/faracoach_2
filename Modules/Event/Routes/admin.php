<?php
//Organizers
Route::namespace('\\Modules\\Event\\Http\\Livewire')->group(function()
{
    Route::get('/organizers',\Admin\Organizers\Organizers::class)->name('organizers');
    Route::get('/all',\Admin\Events\Events::class)->name('all');
});

Route::get('/create','EventController@create')->name('create');
Route::post('/','EventController@store')->name('insert');



