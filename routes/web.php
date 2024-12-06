<?php

use App\Http\Controllers\admin\adminDashboardController;
use App\Http\Controllers\authController;
use App\Http\Controllers\petugasDashboardController;
use App\Http\Controllers\userController;

use App\Http\Controllers\userDashboardController;
use Illuminate\Support\Facades\Route;

//yang ngedit web php cuma dio kalo mau route ngomong yaww



Route::middleware('admin')->group(function () {

    //test------------------------------------------------------------------
    Route::get('/test/dashboard/admin/',[adminDashboardController::class,'dashboard'])->name('admin.dashboard');



});

Route::middleware('petugas')->group(function () {

    //test------------------------------------------------------------------
    Route::get('/test/dashboard/petugas/',[petugasDashboardController::class,'dashboard'])->name('petugas.dashboard');



});


Route::middleware('user')->group(function () {

    //test------------------------------------------------------------------
    Route::get('/test/dashboard/user/',[userDashboardController::class,'dashboard'])->name('user.dashboard');



});





































//Fix
// Route::get('/', function () {
//     return view('layouts.welcome');
// });

// Route::get('/daftar', function () {
//     return view('layouts.daftar');
// });

// Route::get('/home', function () {
//     return view('home-admin');
// });

// Route::get('/dataclient', function () {
//     return view('dataclient-admin');
// });



//Test

//Login---


Route::get('/test/login',[authController::class,'login'])->name('login');
Route::post('/test/login/proses',[authController::class,'loginProses'])->name('loginProses');



Route::get('/test/dashboard/user/',[userDashboardController::class,'dashboard'])->name('user.dashboard');



// // Route untuk Admin
// Route::middleware(['auth', 'admin'])->group(function () {
//     //Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });

// // Route untuk Petugas
// Route::middleware(['auth', 'petugas'])->group(function () {
//     //Route::get('/petugas/dashboard', [PetugasController::class, 'index'])->name('petugas.dashboard');
// });

// Route untuk User
// Route::middleware(['auth', 'user'])->group(function () {
//     //User----
//     //Dashboard----
//
//     //buang
//     Route::get('/test/dashboard/user/{username}/buang', [MultiStepFormController::class, 'index'])->name('formbuang.index');
//     Route::post('/test/dashboard/user/{username}/buang/next', [MultiStepFormController::class, 'next'])->name('formbuang.next');
//     Route::post('/test/dashboard/user/{username}/buang/save', [MultiStepFormController::class, 'save']);
// });


Route::get('/testProfile',[userController::class,'index']);

Route::get('/registerProfile',[userController::class,'registerProfile']);
Route::post('/addUser',[userController::class,'registerUser']);


Route::get('/testDetailProfile/{id}',[userController::class,'userDetail']);

Route::delete('/deleteUser/{id}',[userController::class,'deleteUser']);
