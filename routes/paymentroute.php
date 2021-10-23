<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Routing\Route;


Route::get('/payment', [PaymentController::class, 'viewpayment']);