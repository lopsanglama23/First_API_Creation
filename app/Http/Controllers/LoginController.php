<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showlogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/');
        }
        return redirect()->withErrors(['message' => 'Error during login']);
    }
}

