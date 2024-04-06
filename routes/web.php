<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Sign in/ sign up page
Route::get('/', [UserController::class, 'index'])->name('e_store-login');

//Main Home page
Route::get('/main', [UserController::class, 'home'])->name('e_store-home');

Route::post('/signUp', [UserController::class, 'signUp'])->name('e_store-signUp');

Route::get('/success', [UserController::class, 'success'])->name('e_store-success');


