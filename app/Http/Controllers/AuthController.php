<?php

namespace App\Http\Controllers;
use App\Jobs\SendWelcomeEmail;
use App\Jobs\SendFirebaseNotification;
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

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $data = $request->json()->all(); // read raw JSON

        $validated = validator($data, [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ])->validate();

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('api_token')->plainTextToken;

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