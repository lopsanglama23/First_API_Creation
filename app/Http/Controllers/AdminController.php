<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class AdminController extends Controller
{
    public function create(Request $request){
        $validated = $request->validate([
            'name' =>'requried|string',
            'email' =>'requried|email',
            'password' => 'required|min:8'
        ]); 

        $admin = AdminController::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), 
        ]);
       
    }
}
