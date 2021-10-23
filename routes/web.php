<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\PaymentController;
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

Route::get('/helper', [HelperController::class, 'helper']);



Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', [AdminController::class, 'index']);

    require __DIR__ . '/studentroute.php';
    require __DIR__ . '/subjectroute.php';
    require __DIR__ . '/subjectchoiceroute.php';

});


