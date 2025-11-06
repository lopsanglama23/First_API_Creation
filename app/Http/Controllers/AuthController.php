<?php

namespace App\Http\Controllers;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' =>'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role, 
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        SendWelcomeEmail::dispatch($user);
        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated(); 
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // $token = $user->createToken('api_token')->plainTextToken;
        //SendWelcomeEmail::dispatch($user);
        return response()->json([
            'message'=>'Logged in Successfully',
            'user' => $user,
            'token' => $token
        ], 200);
    }
    public function logout(Request $request)
    {    
        $user=Auth()->user();
        $user->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function WelcomeMessage(User $user)
    {
        $message = Cache::get('welcome_message_'.$user->id);

        if (!$message) {
            $message = 'Welcome '.$user->name;
        }

        return response()->json([
            'user_id' => $user->id,
            'welcome_message' => $message
        ]);
    }
}