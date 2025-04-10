<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('home');
// })->name("base");
use App\Http\Controllers\ChatController;


//User Routes 
Route::get('/', [UserController::class, 'showCorrectHomepage']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::Post('/logout', [UserController::class, 'logout']);
Route::get('/chat', [ChatController::class, 'showChatList'])->middleware('auth');

// Route to start a conversation with a user
Route::get('/chat/start/{user}', [ChatController::class, 'startConversation'])->name('chat.start');

// Route to send a message in a conversation
Route::post('/chat/{conversation}/send', [ChatController::class, 'sendMessage'])->name('chat.send');




