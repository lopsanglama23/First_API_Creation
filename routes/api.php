<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ViewController;
use App\Models\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplyController;



//Route::Controller(AuthController)->group(function()){};
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


/*Route::controller(DogsController::class)->prefix('dogs')->group(function () */
Route::middleware('role')->group(function () {
    Route::post('/dogs', [DogController::class, 'store']);
    Route::put('/dogs/{id}', [DogController::class, 'update']);
    Route::delete('/dogs/{id}', [DogController::class, 'delete']);
    
});

Route::get('/dogs',[ViewController::class, 'view']);

Route::post('/apply', [ApplyController::class, 'apply']);
Route::get('/dogs/search/{name}', [DogController::class, 'search']);
Route::get('/dogs/see/{term}', [DogController::class, 'see']);
/*Route::controller(ApplyController::class)->prefix('apply')->group(function () */
Route::get('/dogs/see/{term}', [DogController::class, 'see']);
Route::get('/users/{id}/applications', [ApplicationController::class, 'userApplications']);

//Admin login resgister api

//Route::get('/user/{id}/applications',[ApplyController::class],'appli')
Route::post('/adminregister', [AdminController::class, 'adminregister']);
Route::post('/adminlogin',[AdminController::class,'login']);
Route::put('/applications/{application_id}/status', [ApplicationController::class, 'updatestatus']);

Route::get('/applicants/{dog_id}',[ApplicationController::class,'applicants']);

