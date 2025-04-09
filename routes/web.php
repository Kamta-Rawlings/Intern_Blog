<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\PostController;

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



//post Routes
Route::get('/createposts', [PostController::class,'create']);
Route::get('/posts', [PostController::class,'posts']);
Route::post('/store', [PostController::class,'store']);
Route::get('/posts/{post}', [PostController::class, 'posts']);
// Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts/{id}', [PostController::class, 'show']);