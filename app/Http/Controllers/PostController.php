<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\contracts\view\view;
use App\Models\Post;



class PostController extends Controller
{
    // Show the form to create a new post
    public function create(): view 
    {
        return view('createposts');
    }

    public function posts(): view
    {
        $posts = Post::where('user_id', auth()->id())->with('user')->get();

        return view('post', [
            'posts' => $posts
        ]);
    }


    // Store a new post
    // This method handles the form submission for creating a new post
    public function store(Request $request)
    {
       
        // Validate the incoming request data
        $incomingfields = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        // Add the authenticated user's ID to the data
        $incomingfields['user_id'] = auth()->id();

        // Save the data to the database using the Post model
       $post= Post::create($incomingfields);

        // Redirect the user to the create posts page with a success message
        // return redirect('/post');
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    // Show all posts created by the authenticated user
    public function show(): view
    {
        // Retrieve all posts created by the authenticated user
    $posts = Post::where('user_id', auth()->id())->get();
        // Return the view for displaying a specific post
        return view('post', [
            'post' => $posts,
        ]);

    }
}
