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
        'emial' => 'required|email',
        'password' => 'required'
       ]);

       dd($request->all());
       Auth::attempt(['email' => $email, 'password' => $password]);

       if(Auth::check()){
           return redirect()->route('home')->with('success', 'Login successful!');
       }
    }
}
