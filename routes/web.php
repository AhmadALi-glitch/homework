<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductsController;
use \App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

// Each Route Redirect The Requst To it's Related Method In The Controllers

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('show-product/{id}', [ProductsController::class, 'show'])->name('show-product');
Route::get('get-products', [ProductsController::class, 'index'])->name('get-products');

// Apply The Middleware On Those Routes  (That Allows Just The User That Has The Token)
Route::middleware('auth:sanctum')->group(function () {

    Route::post('store-product', [ProductsController::class, 'store'])->name('store-product');
    Route::post('update-product/{id}', [ProductsController::class, 'update'])->name('update-product');
    Route::get('delete-product/{id}', [ProductsController::class, 'delete'])->name('delete-product');

});
