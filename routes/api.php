<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//Route::Controller(AuthController)->group(function()){};
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

