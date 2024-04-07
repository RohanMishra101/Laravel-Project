<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Home Page
Route::get('/', [UserController::class, 'index'])->name('e_store-Home');

// Sign in/ sign up page
//Main Home page
Route::get('/login', [UserController::class, 'createAccount'])->name('e_store-login');

//Sign Up process
Route::post('/signUp', [UserController::class, 'signUp'])->name('e_store-signUp');

//Sign In process
Route::post('/signIn', [UserController::class, 'signIn'])->name('e_store-signIn');

//Sign up success
Route::get('/success', [UserController::class, 'success'])->name('e_store-success');


Route::get('/failedSignIn', function () {
    return view('pages.failedSignIn');
})->name('e_store-failedSignIn');

