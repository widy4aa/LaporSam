<?php

use App\Http\Controllers\userController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//profile
Route::get('/testProfile',[userController::class,'index']);

Route::get('/registerProfile',[userController::class,'registerProfile']);
Route::post('/addUser',[userController::class,'registerUser']);


Route::get('/testDetailProfile/{id}',[userController::class,'userDetail']);
