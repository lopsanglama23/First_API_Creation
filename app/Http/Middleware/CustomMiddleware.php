<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CustomMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    
        if ($user && $user->role === 'admin') {
            return $next($request); 
        }
        return response()->json([
            'message' => 'You are not authorized to perform this action.'
        ], 403);

    }
    
}


        // if($request->role === "Admin"){
        //     return response()->json([
        //         'message'=> 'You Can perform your task'
        //     ]);
        // }
        // return $next($request);

         // $role = $request->header('role');
        // if ($role === 'admin') {
        //     return $next($request); 
        // }
        // return response()->json([
        //     'message' => 'You are not authorized to perform this action.'
        // ], 403);