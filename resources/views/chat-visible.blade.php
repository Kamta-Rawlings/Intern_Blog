<x-layout>
    <div class="container py-md-5 container--narrow">
        <h2 class="text-center mb-4">Start a Conversation</h2>
        <div class="list-group mb-4">
            @foreach ($users as $user)
                <a href="{{ route('chat.start', $user->id) }}" class="list-group-item list-group-item-action">
                    <strong>{{ $user->name }}</strong>
                    <span class="text-muted small d-block">{{ $user->email }}</span>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Chat Feature Begins -->
    @if ($conversation)
        <div id="chat-wrapper">
            <div class="chat-title-bar">
                Chat with {{ $conversation->user_one_id == auth()->id() ? $conversation->userTwo->name : $conversation->userOne->name }}
            </div>
            <div id="chat" class="chat-log" style="padding: 10px; background-color: #f9f9f9; height: 400px; overflow-y: auto;">
                <!-- Display Messages -->
                @foreach ($messages as $message)
                    <div class="{{ $message->user_id == auth()->id() ? 'text-end' : 'text-start' }}" style="margin-bottom: 10px;">
                        <div class="d-inline-block p-2 rounded" style="max-width: 70%; {{ $message->user_id == auth()->id() ? 'background-color: #d1e7dd; color: #0f5132;' : 'background-color: #e9ecef; color: #495057;' }}">
                            @if ($message->user_id != auth()->id())
                                <strong>{{ $message->user->name }}:</strong>
                            @endif
                            {{ $message->body }}
                        </div>
                    </div>
                @endforeach
            </div>

            <form method="POST" action="{{ route('chat.send', $conversation->id) }}" id="chatForm" style="padding: 10px; border-top: 1px solid #ddd;">
                @csrf
                <div class="input-group">
                    <input type="text" name="message" id="chatField" class="form-control" placeholder="Type a message…" autocomplete="off" />
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    @else
        <p>Select a user to start a conversation.</p>
    @endif
    <!-- Chat Feature Ends -->
</x-layout>
