<?php

use App\Events\MessageSent;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\ApplyController;
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


    Route::get('/send-message', function(){
        event(new MessageSent('Hello this is my first Pusher Message...!'));

        return 'Message Sent';
    });

    Route::get('/pusher', function () {
    return view('pusher'); 
});

    Route::get('/pusher-chat', function () {
    return view('MessageSents'); 
});


Route::get('/admin-login',[LoginController::class,'loginShow'])->name('admin');

// Route::get('/exports/{status}', [ApplyController::class, 'applicationExport'])->name('applications.export');


