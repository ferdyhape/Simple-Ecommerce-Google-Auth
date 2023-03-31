<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserSideController;

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


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login/google', [AuthController::class, 'redirectToGoole'])->name('loginwithgoogle');
    Route::get('/login/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('loginwithgoogle');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/dashboard/category', CategoryController::class);
    Route::resource('/dashboard/product', ProductController::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/', [UserSideController::class, 'index'])->name('home');
    Route::resource('/cart', CartController::class);
    Route::resource('/toCart', CartDetailController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
