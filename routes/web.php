<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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

// Confirm Store Creation
Route::get('/storeConfirm', [StoreController::class, 'confirmStore'])->name('e_store-storeConfirm');

// User Profile
Route::get('/userProfile', [UserController::class, 'userProfile'])->name('e_store-userProfile');

// Update User Profile
Route::post('/updateProfile/{id}', [UserController::class, 'updateProfile'])->name('e_store-updateProfile');

Route::get('/forgetPassword', [UserController::class, 'forgetPassword'])->name('e_store-forgetPassword');

Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('e_store-updatePassword');

Route::get('/failedSignIn', function () {
    return view('pages.failedSignIn');
})->name('e_store-failedSignIn');

Route::post('/transactionMethod/{id}', [UserController::class, 'transactionMethod'])->name('e_store-transactionMethod');

Route::post('/transactionMethodUpdate/{id}', [UserController::class, 'transactionMethodUpdate'])->name('e_store-transactionMethodUpdate');

Route::get('/logout', [UserController::class, 'logout'])->name('e_store-logout');

Route::get('/loginConfirm', [UserController::class, 'loginConfirm'])->name('e_store-loginConfirm');


// Store creation page
Route::get('/createStore', [StoreController::class, 'index'])->name('e_store-createStore');

Route::post('/storeCreation', [StoreController::class, 'storeCreation'])->name('e_store-storeCreation');

Route::get('/dashboard', [ProductController::class, 'index'])->name('e_store-dashboard');

Route::post('/productAdd', [ProductController::class, 'addProduct'])->name('e_store-addProduct');

Route::post('/productEdit/{id}', [ProductController::class, 'editProduct'])->name('e_store-editProduct');

Route::post('/productDelete/{id}', [ProductController::class, 'deleteProduct'])->name('e_store-deleteProduct');

Route::get('/inCart', [OrderController::class, 'inCartOrder'])->name('e_store-inCartOrder');

Route::post('/cartItemConfirm/{id}', [OrderController::class, 'confirmCartOrder'])->name('e_store-confirmCartOrder');

Route::post('/cartItemDelete/{id}', [OrderController::class, 'deleteCartOrder'])->name('e_store-deleteCartOrder');

Route::get('/listConfirmOrder', [OrderController::class, 'listOrder'])->name('e_store-listConfirmOrder');

Route::get('/listSentOrder', [OrderController::class, 'listSentOrder'])->name('e_store-listSentOrder');

Route::post('/sendOrder/{id}/{no}', [OrderController::class, 'sendOrder'])->name('e_store-sendOrder');

Route::get('/edit/{id}', [ProductController::class, 'editStore'])->name('e_store-editStore');

Route::post('/orderCreate/{id}/{storeName}', [OrderController::class, 'addToCart'])->name('e_store-addToCart');

Route::get('/search', [SearchController::class, 'index'])->name('e_store-search');








Route::get('/{storeName}', [UserStoreController::class, 'storePage'])->name('e_store-storePage');





