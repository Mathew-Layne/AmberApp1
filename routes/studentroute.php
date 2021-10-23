<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



Route::get('dashboard/addstudent', [StudentController::class, 'viewStudent']);
Route::post('dashboard/addstudent', [StudentController::class, 'addStudent']);

Route::get('dashboard/studentlist', [StudentController::class, 'studentList']);


Route::get('dashboard/student/edit/{id}', [StudentController::class, 'editview']);
Route::post('dashboard/student/edit/{id}', [StudentController::class, 'editStudent']);
Route::get('dashboard/student/delete/{id}', [StudentController::class, 'deleteStudent']);

