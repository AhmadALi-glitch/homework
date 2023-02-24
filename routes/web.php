<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductsController;
use \App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




// Route::post('/register', [UserController::class, 'register'])->name('register');
// Route::post('/login', [UserController::class, 'login'])->name('login');

 
// Route::get('show-product/{id}', [ProductsController::class, 'show']);
// Route::get('get-products', [ProductsController::class, 'index']);


// Route::middleware('auth:sanctum')->group(function () {

//     Route::post('store-product', [ProductsController::class, 'store']);
//     Route::post('update-product/{id}', [ProductsController::class, 'update']);
//     Route::get('delete-product/{id}', [ProductsController::class, 'delete']);
// });