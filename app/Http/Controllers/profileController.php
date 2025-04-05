<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_pictures', $fileName, 'public');

            // Save the file path in the authenticated user's profile
            Auth::user()->update(['profile_picture' => $filePath]);

            return response()->json([
                'message' => 'Profile picture updated successfully!',
                'path' => $filePath
            ], 200);
        }

        return response()->json(['message' => 'No file uploaded'], 400);
    }
}
