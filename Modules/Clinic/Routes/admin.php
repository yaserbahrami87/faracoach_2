<?php
//users
Route::namespace('\\Modules\\Clinic\\Http\\Livewire\\Admin\\')->group(function()
{
    Route::get('/categories',\ClinicCategory::class)->name('categories');

    //Coach
    Route::get('/coach/requests',Coach\CoachReques::class)->name('coach.requests');
});

Route::delete('/category/{ClinicCategory}','ClinicCategoryController@destroy')->name('category.destroy');

