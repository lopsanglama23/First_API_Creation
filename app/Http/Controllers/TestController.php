<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Dog;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test($id)
    {       
        $user = User::with('applications.dog')->find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }
}

