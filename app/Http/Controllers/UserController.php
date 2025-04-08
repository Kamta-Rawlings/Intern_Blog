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


    //Login for a User
  public function login(Request $request){
   $incomingfields = $request-> validate ([
        'loginusername'=> 'required',
        'loginpassword'=> 'required'
    ]);
    if (auth()->attempt(['username'=>$incomingfields['loginusername'], 'password'=>$incomingfields['loginpassword']])){
        $request->session()->regenerate();
        return 'congrats';
        // return redirect('/')->with('Success','You have successfully logged in');
     }
        else {
           return 'sorry!!';
        //    return redirect('/')->with('failure','Invalid login');
        }
    }
  


    //Register a new user
    public function  register(Request $request){
      $incomingfields = $request->validate ([
            'username' =>  ['required', 'min:4' , 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email',Rule::unique('users', 'email')],
            'password' => ['required','min:4','confirmed']     
        ]);
         $user = User::create ($incomingfields);
         auth()->login($user);
         return 'me';
    }
}
