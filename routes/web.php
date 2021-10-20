<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware'=>'auth'], function(){

    Route::get('dashboard', [AdminController::class, 'index']);

    Route::get('dashboard/addstudent', [StudentController::class, 'viewStudent']);
    Route::post('dashboard/addstudent', [StudentController::class, 'addStudent']);

    Route::get('dashboard/studentlist', [StudentController::class, 'studentList']);

    Route::get('dashboard/student/edit/{id}', [StudentController::class, 'editStudent']);
    Route::get('dashboard/student/delete/{id}', [StudentController::class, 'deleteStudent']);


    Route::get('dashboard/addsubject', [SubjectController::class, 'viewSubject']);
    Route::post('dashboard/addsubject', [SubjectController::class, 'addSubject']);

    Route::get('dashboard/subjectlist', [SubjectController::class, 'subjectList']);

    Route::get('dashboard/subject/edit/{id}', [SubjectController::class, 'editSubject']);
    Route::get('dashboard/subject/delete/{id}', [SubjectController::class, 'deleteSubject']);
    
});