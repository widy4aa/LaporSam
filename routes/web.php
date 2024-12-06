<?php

use App\Http\Controllers\userController;

use App\Http\Controllers\userDashboardController;
use Illuminate\Support\Facades\Route;

//yang ngedit web php cuma dio kalo mau route ngomong yaww

//Fix


Route::get('/', function () {
    return view('layouts.welcome');
});

Route::get('/daftar', function () {
    return view('layouts.daftar');
});

Route::get('/home', function () {
    return view('home-admin');
});

Route::get('/dataclient', function () {
    return view('dataclient-admin');
});



//Test

//User-
//Dashboard----
Route::get('/test/dashboard/user/{username}',[userDashboardController::class,'dashboard']);



Route::get('/testProfile',[userController::class,'index']);

Route::get('/registerProfile',[userController::class,'registerProfile']);
Route::post('/addUser',[userController::class,'registerUser']);


Route::get('/testDetailProfile/{id}',[userController::class,'userDetail']);

Route::delete('/deleteUser/{id}',[userController::class,'deleteUser']);
