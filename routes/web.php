<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('home');
})->name("base");

Route::get('/register', function () {
    return view('register');
})->name("register");

Route::post('/logout', function () {
    auth()->logout();
    return redirect()->route('base');
})->name("logout");

Route::post('/signup', [userController::class, 'signup'])->name('signup');
Route::post('/login', [userController::class, 'login'])->name('login');

// redirect's to the creat post page
Route::get('/create-post', [PostController::class, 'showCreateForm'])->name('create-post');

Route::post('/save-post', [PostController::Class, 'savePost'])->name('save-post');










// // Show profile picture update form (GET request)
// Route::get('/update-profile-picture', [ProfileController::class, 'showUpdateForm'])
//     ->middleware('auth')
//     ->name('update-profile-picture');

// // Handle profile picture upload (POST request)
// Route::post('/update-profile-picture', [ProfileController::class, 'updateProfilePicture'])
//     ->middleware('auth');