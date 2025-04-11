<x-layout>
    <div class="container py-md-5 container--narrow">
      @if ($post->isEmpty())
      <p>No posts found. Create your first post!</p>
      @else
      <h2 class="text-center mb-4">Posts</h2>
      <p class="text-center mb-4">Here are the latest posts from our community.</p>
      @foreach ($post as $post)
      <div class="d-flex justify-content-between">
        <h2>{{ $post->title }}</h2>
        <span class="pt-2">
        <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
        <form class="delete-post-form d-inline" action="/post/{{ $post->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
        </form>
        </span>
      </div>

      <p class="text-muted small mb-4">
        <a href="#"><img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
        Posted by <a>{{ $post->user->username ?? 'Anonymous' }}</a> on {{ $post->created_at ? $post->created_at->format('n/j/Y') : 'Unknown Date' }}
      </p>

      <div class="body-content">
        <p>{!! nl2br(e($post->content)) !!}</p>
      </div>
      <hr>
      @endforeach

        @endif
    </div>
</x-layout>