<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(){
        return view("pages.signup");
    }

    public function register(Request $request){
        $request->validate([
            "fullName" => "required",
            "email" => "required|email",
            "password" => "required|min:6|confirmed"
        ]);

        // dd($request->all());

        User::create([
            'name' => $request['fullName'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
    
        return redirect()->route("login")->with('success', 'Registration successful!');
    }

    public function login(){
        return view("pages.login");
    }

    public function authenticate(Request $request){
       $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6'
       ]);

       if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->regenerate();

           return redirect()->route('home')->with('success', 'Welcome back,', Auth::user()->name . '!');
       }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

    
}
