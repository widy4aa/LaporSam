<?php

use App\Http\Controllers\userController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/testProfile',[userController::class,'index']);
Route::get('/testDetailProfile/{id}',[userController::class,'userDetail']);
