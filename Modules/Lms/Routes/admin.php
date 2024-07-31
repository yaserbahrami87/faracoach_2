<?php

//course types
Route::get('/CourseType','CourseTypeController@index')->name('coursetypes');
Route::get('/CourseType/{CourseType}/edit','CourseTypeController@edit')->name('coursetype.edit');
Route::patch('/CourseType/{CourseType}/update','CourseTypeController@update')->name('coursetype.update');
Route::delete('/CourseType/{CourseType}/destroy','CourseTypeController@destroy')->name('coursetype.delete');

Route::namespace('\\Modules\\Lms\\Http\\Livewire')->group(function()
{
    Route::get('/CourseType/create',\Admin\CourseTypes\CourseTypesInsert::class)->name('coursetype.create');
});

//Teachers
Route::get('/teachers','TeacherController@index')->name('teachers');

Route::patch('/teachers/{Teacher}/update','TeacherController@update')->name('teacher.update');
Route::delete('/teachers/{Teacher}/destroy','TeacherController@destroy')->name('teacher.delete');
Route::namespace('\\Modules\\Lms\\Http\\Livewire')->group(function()
{
    Route::get('/teacher/create',\Admin\Teachers\TeacherInsert::class)->name('teacher.create');
    Route::get('/teacher/{Teacher}/edit',\Admin\Teachers\TeacherEdit::class)->name('teacher.edit');
});

//Courses
Route::get('/','CourseController@index')->name('all');
Route::get('/{Course}/edit','CourseController@edit')->name('edit');
Route::post('/','CourseController@store')->name('store');
Route::patch('/{Course}','CourseController@update')->name('update');
Route::delete('/{Course}','CourseController@update')->name('delete');
Route::namespace('\\Modules\\Lms\\Http\\Livewire')->group(function()
{
    Route::get('/create',\Admin\Courses\CourseInsert::class)->name('create');
    Route::get('/student/create',\Admin\Students\StudentInsert::class)->name('student.create');

//    Route::get('/course/{Teacher}/edit',\Admin\Courses\CourseEdit::class)->name('course.edit');
});


//Students
Route::get('/{Course}/students','CourseController@students')->name('students.course');
Route::namespace('\\Modules\\Lms\\Http\\Livewire')->group(function()
{
    Route::get('/students',\Admin\Students\Students::class)->name('students');
    Route::get('/student/{Student}',\Admin\Students\StudentEdit::class)->name('student.edit');
});
//Students
Route::delete('/student/{Student}','StudentController@destroy')->name('student.delete');

//Exam
Route::get('/exams','ExamController@index')->name('exams');
Route::get('/exam/create','ExamController@create')->name('exam.create');
Route::post('/exam','ExamController@store')->name('exam.store');
Route::get('/exam/edit/{Exam}','ExamController@edit')->name('exam.edit');
Route::patch('/exam/{Exam}','ExamController@update')->name('exam.update');
Route::delete('/exam/{Exam}','ExamController@destroy')->name('exam.delete');
//Exam Questions
Route::get('/exam/{Exam}/questions','ExamController@examQuetions_show')->name('exam.questions');
Route::get('/exam/{Exam}/question/create','ExamController@ExamQuetions_create')->name('exam.question.create');
Route::post('/exam/{Exam}/question','ExamController@ExamQuetions_store')->name('exam.question.insert');
Route::get('/exam/{Exam}/question/{ExamQuestion}/edit','ExamQuestionController@edit')->name('exam.question.edit');
Route::patch('/exam/{Exam}/question/{ExamQuestion}','ExamQuestionController@update')->name('exam.question.update');
Route::delete('/exam/{Exam}/question/{ExamQuestion}','ExamQuestionController@destroy')->name('exam.question.delete');

//Exam Take
Route::get('/exam/takes','ExamTakeController@index')->name('exam.takes');
Route::get('/exam/take/{ExamTake}/show','ExamTakeController@show')->name('exam.take.show');
Route::patch('/exam/take/{ExamTake}','ExamTakeController@update')->name('exam.take.update');




