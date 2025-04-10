<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;


//User Routes 
Route::get('/', [UserController::class, 'showCorrectHomepage']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::Post('/logout', [UserController::class, 'logout']);
Route::get('/chat', [ChatController::class, 'showChatList'])->middleware('auth');




// Route to show the form for creating a new post
Route::get('/createposts', [PostController::class, 'create']);
// Route to store a new post
Route::post('/posts', [PostController::class, 'store']);
// // Route to show a specific post
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');





// Route to start a conversation with a user
Route::get('/chat/start/{user}', [ChatController::class, 'startConversation'])->name('chat.start');

// Route to send a message in a conversation
Route::post('/chat/{conversation}/send', [ChatController::class, 'sendMessage'])->name('chat.send');


