<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/excel', function () {
    return view('excel');
});

Route::get('/export-users',[UserController::class,'index']);
Route::get('/exports/{status}',[ApplyController::class,'applicationExport']);
Route::get('/pdf/{id}',[PdfController::class,'pdfGenerator']);


// Route::get('/exports/{status}', [ApplyController::class, 'applicationExport'])->name('applications.export');

Route::get('/auth', function () {
    return view('auth.login');
});


Route::get('/login',[LoginController::class,'showlogin'])->name('auth.login');
Route::post('/login',[LoginController::class,'login'])->name('login');