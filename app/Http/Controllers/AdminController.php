<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminloginRequest;
use App\Http\Requests\LogoutRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     public function adminregister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), 
        ]);

        $token = $admin->createToken('auth_token')->plainTextToken;
        return response()->json([
            'status' => true,
            'message' => 'Admin registered successfully',
            'user' => $admin,
            'token' => $token
        ], 201);
    }

    public function login(AdminloginRequest $request)
    {
        $validated = $request->validated(); 
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        
        $token = $admin->createToken('api_token')->plainTextToken;
        return response()->json([
            'user' => $admin,
            'token' => $token
        ], 200);
    }
    public function logout(Request $request)
    {    
        $admin = auth()->user();
        $admin->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }

}
