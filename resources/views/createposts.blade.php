<x-layout>

  <div class="container py-md-5 container--narrow">
    <form action="/posts" method="POST">
    @csrf

      <div class="form-group">
        <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
        <input required name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
        @error('title')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="post-body" class="text-muted mb-1" name="post-body"><small>Body Content</small></label>
        <textarea required name="content" id="post-body" class="body-content tall-textarea form-control" type="text"></textarea>
        @error('post-body')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
      </div>
  
      <button class="btn btn-primary">Save New Post</button>
    </form>
  </div>
  
</x-layout>