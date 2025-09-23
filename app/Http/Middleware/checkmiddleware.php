<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    */
    public function handle(Request $request, Closure $next): Response
    {
        //if($request->name !== "dog -1"){
        // return response()->json(['you are not allowed']);
        //}
        // return $next($request);
        
            return response()->json(['you are not allowed']);
    }
}
