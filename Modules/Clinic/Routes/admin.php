<?php
//users
Route::namespace('\\Modules\\Clinic\\Http\\Livewire')->group(function()
{
    Route::get('/categories',\Admin\ClinicCategory::class)->name('categories');
});

Route::delete('/category/{ClinicCategory}','ClinicCategoryController@destroy')->name('category.destroy');

