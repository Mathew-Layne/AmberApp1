<?php

use App\Http\Controllers\SubjectChoiceController;
use Illuminate\Support\Facades\Route;



Route::get('dashboard/student/view/{id}', [SubjectChoiceController::class, 'studentProfile']);

Route::get('dashboard/subject/selection/{id}', [SubjectChoiceController::class, 'chooseSubject']);
Route::post('dashboard/subject/selection/{id}', [SubjectChoiceController::class, 'subjectAdded']);

Route::get('dashboard/subject/choice', [SubjectChoiceController::class, 'subjectChoice']);

Route::get('subject/choice/approve/{id}', [SubjectChoiceController::class, 'approveChoice']);
Route::get('subject/choice/deny/{id}', [SubjectChoiceController::class, 'denyChoice']);
