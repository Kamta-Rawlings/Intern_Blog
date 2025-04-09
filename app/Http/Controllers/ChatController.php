<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display the list of users to start a conversation with.
     *
     * @return \Illuminate\View\View
     */
    public function showChatList()
    {
        // Get all users except the authenticated user
        $users = User::where('id', '!=', auth()->id())->get();

        // Pass empty $messages and $conversation to avoid undefined variable errors
        $messages = collect(); // Empty collection for messages
        $conversation = null; // No active conversation

        // Return the view with the list of users, messages, and conversation
        return view('chat-visible', compact('users', 'messages', 'conversation'));
    }

    /**
     * Start a conversation with a specific user.
     *
     * @param  int  $userId
     * @return \Illuminate\View\View
     */
    public function startConversation($userId)
    {
        // Find the user to start a conversation with
        $user = User::findOrFail($userId);

        // Check if a conversation already exists between the authenticated user and the selected user
        $conversation = Conversation::where(function ($query) use ($user) {
            $query->where('user_one_id', auth()->id())
                  ->where('user_two_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('user_one_id', $user->id)
                  ->where('user_two_id', auth()->id());
        })->first();

        // If no conversation exists, create a new one
        if (!$conversation) {
            $conversation = Conversation::create([
                'user_one_id' => auth()->id(),
                'user_two_id' => $user->id,
            ]);

            // Ensure the conversation was created successfully
            if (!$conversation) {
                abort(500, 'Failed to create a new conversation.');
            }
        }

        // Retrieve all messages for the conversation
        $messages = Message::where('conversation_id', $conversation->id)->get();

        // Get all users except the authenticated user (to display the user list)
        $users = User::where('id', '!=', auth()->id())->get();

        // Pass the users, conversation, and messages to the view
        return view('chat-visible', compact('users', 'conversation', 'messages'));
    }

    /**
     * Send a message in a specific conversation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $conversationId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMessage(Request $request, $conversationId)
    {
        // Validate the message content
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // Find the conversation by ID
        $conversation = Conversation::findOrFail($conversationId);

        // Save the new message
        $message = new Message();
        $message->user_id = auth()->id();  // User sending the message
        $message->conversation_id = $conversation->id;
        $message->body = $request->message;
        $message->save();

        // Redirect back to the conversation page with updated messages
        return redirect()->route('chat.start', $conversation->user_two_id == auth()->id() ? $conversation->user_one_id : $conversation->user_two_id);
    }
}
