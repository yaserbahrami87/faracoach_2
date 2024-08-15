<?php
//Organizers
Route::namespace('\\Modules\\Event\\Http\\Livewire')->group(function()
{
    Route::get('/organizers',\Admin\Organizers\Organizers::class)->name('organizers');
    Route::get('/all',\Admin\Events\Events::class)->name('all');


    //Participants
    Route::get('/{event}/participant/create',\Admin\Participants\ParticipantInsert::class)->name('participant.create');
});

Route::get('/create','EventController@create')->name('create');
Route::get('/{event}/edit','EventController@edit')->name('edit');
Route::patch('/{event}','EventController@update')->name('update');
Route::post('/','EventController@store')->name('insert');
Route::delete('/{event}','EventController@destroy')->name('destroy');


//Participants
Route::get('/{event}/participants','EventController@participants')->name('participants');
Route::delete('/participant/{EventParticipants}','EventParticipantsController@destroy')->name('participant.destroy');





