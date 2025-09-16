<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplyController;

//Route::Controller(AuthController)->group(function()){};
/*Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
*/
Route::post('/dogs', [DogsController::class, 'store']);
Route::put('/dogs/{id}', [DogsController::class, 'update']);
Route::delete('/dogs/{id}',[DogsController::class,'delete']);
Route::get('/dogs/search/{name}', [DogsController::class, 'search']);

Route::post('/apply', [ApplyController::class,'apply']);
Route::get('/dogs/see/{term}', [DogsController::class, 'see']);