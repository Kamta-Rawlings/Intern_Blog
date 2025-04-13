<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\searchController;
use App\Services\ElasticsearchService;
use Illuminate\Http\Request;
use App\Models\User;


Route::get('/search-users', function (Request $request, ElasticsearchService $es) {
    $query = $request->input('q');

    if (!$query) {
        return 'Please provide a query using ?q=...';
    }

    $results = $es->searchUsers($query);
    
    return response()->json(
    collect($results->asArray()['hits']['hits'])->pluck('_source')
);

});


Route::get('/es-test', function (ElasticsearchService $es) {
    $info = $es->getClient()->info();

    return response()->json($info->asArray());
});


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
Route::get('/profile', [UserController::class, 'showProfile']);
Route::get('search', [SearchController::class, 'showSearchPage'])->name('search');
// Route::post('/search', [SearchController::class, 'search']);


