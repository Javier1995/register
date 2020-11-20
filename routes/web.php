<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;


//Register
Route::get('/register', [RegisterController::class, 'index'])->name('register'); 
Route::post('/register', [RegisterController::class, 'store']);

/* Logout */

Route::get('/logout',[LogoutController::class, 'logout'])->name('logout');

/* Dashboard */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/* Login */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'login'])->name('inside');

Route::get('/', function () {
    return view('post.index');
})->name('posts');


