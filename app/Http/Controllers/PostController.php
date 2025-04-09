<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\contracts\view\view;
use App\Models\Post;

class PostController extends Controller
{
    public function create(): view 
    {
        return view('createposts');
    }

    public function posts(Post $posts): view
    {
        return view('post', [
            'posts' => $posts
        ]);
    }
   
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
        return redirect('/post');
    }
    // Show a specific post
    // public function show($id): view
    // {
    //     // Find the post by its ID
    //     $post = Post::findOrFail($id);

    //     // Return the view with the post data
    //     return view('post', ['post' => $post]);
    // }
}
 