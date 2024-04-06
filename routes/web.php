<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'index'])->name('e_store-login');



Route::post('/toggle-merchant', [UserController::class, 'toggleMerchant'])->name('toggle.merchant');
