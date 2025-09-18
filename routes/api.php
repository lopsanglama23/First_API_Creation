<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TestController;
use App\Models\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplyController;


//Route::Controller(AuthController)->group(function()){};
/*Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
*/

/*Route::controller(DogsController::class)->prefix('dogs')->group(function () */
Route::post('/dogs', [DogsController::class, 'store']);
Route::put('/dogs/{id}', [DogsController::class, 'update']);
Route::delete('/dogs/{id}',[DogsController::class,'delete']);
Route::get('/dogs/search/{name}', [DogsController::class, 'search']);
Route::get('/dogs/see/{term}', [DogsController::class, 'see']);

/*Route::controller(ApplyController::class)->prefix('apply')->group(function () */
Route::get('/dogs/see/{term}', [DogsController::class, 'see']);
Route::post('/apply', [ApplyController::class, 'apply']);

Route::get('/users/{id}/applications', [ApplicationController::class, 'userApplications']);

//Admin login resgister api

//Route::get('/user/{id}/applications',[ApplyController::class],'appli')
Route::post('/adminregister', [AdminController::class, 'adminregister']);

Route::put('/applications/{application_id}/status', [ApplicationController::class, 'updatestatus']);



