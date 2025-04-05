<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contrast\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all posts from the database
        $posts = Post::all();

        // Return the posts to the view
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        // Return the view for creating a new post
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        \App\Models\Post::create($validated);

        return redirect()->route('base')->with('message', 'Post created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function savePost(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Create a new post
        Post::create($validated);

        // Redirect to the home page with a success message
        return redirect()->route('post')->with('message', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function showCreateForm()
{
    return view('create-post'); // Return a Blade view for the form
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    // public function store(StorePostRequest $request): 
    // {
    //     $validated = $request->validated(); 
        
    //     $validated = $request->safe()->only(['title', 'content']);
    //     $validated = $request->safe()->except(['title', 'content']);

    //     return redirect('post')
    // }
}
