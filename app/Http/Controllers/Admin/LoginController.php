<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginShow(){
        return view('Admin.loginPage');
    }

    public function login(Request $request){
        $val = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        
    }
}
