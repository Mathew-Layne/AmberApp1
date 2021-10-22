<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectChoiceController;
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

require __DIR__ . '/auth.php';
require __DIR__ . '/helper.php';


Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', [AdminController::class, 'index']);

    require __DIR__ . '/student.php';
    require __DIR__ . '/subject.php';
    require __DIR__ . '/subjectchoice.php';

});
