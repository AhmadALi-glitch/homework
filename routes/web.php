<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductsController;
use \App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::match('post', '/register', [UserController::class, 'register'])->name('register');
Route::match('post', '/login', [UserController::class, 'login'])->name('login');

Route::get('show-product/{id}', [ProductsController::class, 'show'])->name('show-product');
Route::get('get-products', [ProductsController::class, 'index'])->name('get-products');

Route::middleware('auth:sanctum')->group(function () {

    Route::post('store-product', [ProductsController::class, 'store'])->name('store-product');
    Route::post('update-product/{id}', [ProductsController::class, 'update'])->name('update-product');
    Route::get('delete-product/{id}', [ProductsController::class, 'delete'])->name('delete-product');

});
