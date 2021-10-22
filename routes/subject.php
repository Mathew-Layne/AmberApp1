<?php

use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;


Route::get('dashboard/addsubject', [SubjectController::class, 'viewSubject']);
Route::post('dashboard/addsubject', [SubjectController::class, 'addSubject']);

Route::get('dashboard/subjectlist', [SubjectController::class, 'subjectList']);

Route::get('dashboard/subject/edit/{id}', [SubjectController::class, 'editview']);
Route::post('dashboard/subject/edit/{id}', [SubjectController::class, 'editSubject']);
Route::get('dashboard/subject/delete/{id}', [SubjectController::class, 'deleteSubject']);
