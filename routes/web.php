<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('home');
})->name("base");

Route::get('/register', function () {
    return view('register');
})->name("register");

Route::post('/signup', [userController::class, 'signup'])->name('signup');
Route::post('/login', [userController::class, 'login'])->name('login');