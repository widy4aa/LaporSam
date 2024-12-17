<?php

use App\Http\Controllers\authController;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

//yang ngedit web php cuma dio kalo mau route ngomong yaww

// Route::get(uri: '/',action: [authController::class,'login'])->name('login');
Route::get('/login',action: [authController::class,'login'])->name('login');
Route::post('/test/login/proses',[authController::class,'loginProses'])->name('loginProses');
Route::post('/logout',[authController::class,'logout'])->name('logout');
Route::get('/register',Register::class);


require base_path('routes/admin.php');
require base_path('routes/petugas.php');
require base_path('routes/user.php');










































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




// Route::get('/test/dashboard/user/',[userDashboardController::class,'dashboard'])->name('user.dashboard');



// // // Route untuk Admin
// // Route::middleware(['auth', 'admin'])->group(function () {
// //     //Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// // });

// // // Route untuk Petugas
// // Route::middleware(['auth', 'petugas'])->group(function () {
// //     //Route::get('/petugas/dashboard', [PetugasController::class, 'index'])->name('petugas.dashboard');
// // });

// // Route untuk User
// // Route::middleware(['auth', 'user'])->group(function () {
// //     //User----
// //     //Dashboard----
// //
// //     //buang
// //     Route::get('/test/dashboard/user/{username}/buang', [MultiStepFormController::class, 'index'])->name('formbuang.index');
// //     Route::post('/test/dashboard/user/{username}/buang/next', [MultiStepFormController::class, 'next'])->name('formbuang.next');
// //     Route::post('/test/dashboard/user/{username}/buang/save', [MultiStepFormController::class, 'save']);
// // });


// Route::get('/testProfile',[userController::class,'index']);

// Route::get('/registerProfile',[userController::class,'registerProfile']);
// Route::post('/addUser',[userController::class,'registerUser']);


// Route::get('/testDetailProfile/{id}',[userController::class,'userDetail']);

// Route::delete('/deleteUser/{id}',[userController::class,'deleteUser']);
