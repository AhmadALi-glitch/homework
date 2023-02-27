<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductsController;
use \App\Http\Controllers\UserController;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});




Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');
Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');


Route::middleware(['JsonRequestMiddleware'])->group(function () {
    
    Route::get('show-product/{id}', [ProductsController::class, 'show'])->name('show-product');
    Route::get('get-products', [ProductsController::class, 'index'])->name('get-products');
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('store-product', [ProductsController::class, 'store'])->name('store-product');
    Route::post('update-product/{id}', [ProductsController::class, 'update'])->name('update-product');
    Route::get('delete-product/{id}', [ProductsController::class, 'delete'])->name('delete-product');
});


Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
 
    $token = csrf_token();
 
    // ...
    return $token;
});