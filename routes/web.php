<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

// Route::get('/', function () {
//     return view('home');
// })->name("base");

// Route::get('/register', function () {
//     return view('register');
// })->name("register");

//User Routes 
Route::get('/', [UserController::class, 'showCorrectHomepage']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
// Route::post('/logout', [UserController::class, 'logout']);
Route::Post('/logout', [UserController::class, 'logout']);

// Route::post('/signup', [userController::class, 'signup'])->name('signup');
