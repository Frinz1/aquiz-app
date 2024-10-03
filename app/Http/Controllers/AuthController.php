<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view("auth.login");
    }


    public function loginPost(Request $request)
    {

        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $credentials = $request->only("email", "password");


        if (Auth::attempt($credentials)) {
          
            return redirect()->route('redirect'); 
        }

   
        return redirect(route("login"))->with("error", "Login failed");
    }

  
    public function register()
    {
        return view("auth.register");
    }


    public function registerPost(Request $request)
    {
        
        $request->validate([
            "fullname" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6",
        ]);

     
        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->usertype = 'user'; 

        if ($user->save()) {
     
            return redirect(route("login"))->with("success", "User created successfully");
        }


        return redirect(route("register"))->with("error", "Failed to create account");
    }
}