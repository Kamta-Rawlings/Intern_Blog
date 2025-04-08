<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController_old extends Controller
{

     // Handle user sign-up
    public function signup(Request $request)
    {

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed', // 'confirmed' ensures password matches 'password_confirmation'
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

         // Log in the user
    auth()->login($user);
        // Redirect to the login-blade.php view
    return view('home-logged-in-no-results')->with('message', 'Registration successful! You are now logged in.');
    }

    // Handle user login
    public function login(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) { return response()->json(['errors' => $validator->errors()], 422);
        }

        // Attempt to authenticate the user using name and password
        $user = User::where('name', $request->name)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Authentication successful
            return view('home-logged-in-no-results')->with('message', 'Registration successful! You are now logged in.');


        }

        // If authentication fails
        return response()->json(['message' => 'Invalid name or password.'], 401);
    }
}

