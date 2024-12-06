<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\MultiStepFormController;
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

//Login---
Route::get('/test/login',[authController::class,'index']);



//User----
//Dashboard----
Route::get('/test/dashboard/user/{username}',[userDashboardController::class,'dashboard']);

//buang
Route::get('/test/dashboard/user/{username}/buang', [MultiStepFormController::class, 'index'])->name('formbuang.index');
Route::post('/test/dashboard/user/{username}/buang/next', [MultiStepFormController::class, 'next'])->name('formbuang.next');
Route::post('/test/dashboard/user/{username}/buang/save', [MultiStepFormController::class, 'save']);



Route::get('/testProfile',[userController::class,'index']);

Route::get('/registerProfile',[userController::class,'registerProfile']);
Route::post('/addUser',[userController::class,'registerUser']);


Route::get('/testDetailProfile/{id}',[userController::class,'userDetail']);

Route::delete('/deleteUser/{id}',[userController::class,'deleteUser']);
