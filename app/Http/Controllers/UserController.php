<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    //show the homepage
    public function showCorrectHomepage(){
        return view ('home');
    }

    //Register a new user
    public function  register(Request $request){
      $incomingfields = $request->validate ([
            'username' =>  ['required', 'min:4' , 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email',Rule::unique('users', 'email')],
            'password' => ['required','min:4','confirmed']     
        ]);
         User::create ($incomingfields);
         return 'me';
    }
}
