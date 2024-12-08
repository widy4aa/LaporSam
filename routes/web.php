<?php

use App\Http\Controllers\admin\adminDashboardController;
use App\Http\Controllers\admin\adminPetugasController;
use App\Http\Controllers\admin\adminTempatPembuanganController;
use App\Http\Controllers\admin\adminUserController;
use App\Http\Controllers\authController;
use App\Http\Controllers\petugas\ambilSampahController;
use App\Http\Controllers\petugas\antarSampahController;
use App\Http\Controllers\petugas\leaderboardPetugas;
use App\Http\Controllers\petugas\petugasDashboardController;
use App\Http\Controllers\user\buangController;
use App\Http\Controllers\user\leaderboardController;
use App\Http\Controllers\user\usersDashboardController;
use App\Http\Controllers\userController;

use App\Livewire\admin\DetailPetugas;

use App\Livewire\admin\DetailTempatPembuangan;
use App\Livewire\admin\DetailUser;
use App\Livewire\admin\Jadwal;
use App\Livewire\admin\PetugasForm;
use App\Livewire\Formbuang;

use App\Livewire\Petugas\Dashboard;
use App\Livewire\Petugas\DetailSampahAmbil;
use App\Livewire\Petugas\DetailSampahAntar;
use Illuminate\Support\Facades\Route;

//yang ngedit web php cuma dio kalo mau route ngomong yaww


Route::get('/test/login',[authController::class,'login'])->name('login');
Route::post('/test/login/proses',[authController::class,'loginProses'])->name('loginProses');
Route::post('/logout',[authController::class,'logout'])->name('logout');




Route::middleware('admin')->group(function () {

    //test------------------------------------------------------------------

    Route::get('/test/dashboard/admin/',[adminDashboardController::class,'dashboard'])->name('admin.dashboard');

    Route::get('/test/admin/TempatPembuangan',[adminTempatPembuanganController::class,'listTempatPembuangan'])->name('admin.listTempatPembuangan');
    Route::get('/test/admin/TempatPembuangan/add',[adminTempatPembuanganController::class,'formaddTempatPembuangan'])->name('admin.addTempatPembuangan');
    Route::post('/test/admin/TempatPembuangan/add/proses',[adminTempatPembuanganController::class,'addTempatPembuanganProses'])->name('admin.addTempatPembuanganProses');
   // Route::get('/test/admin/TempatPembuangan/{id}',[adminTempatPembuanganController::class,'detailTempatPembuangan'])->name('admin.detailTempatPembuangan');
    Route::get('/test/admin/TempatPembuangan/{id}',DetailTempatPembuangan::class);

    Route::get('/test/admin/Petugas',[adminPetugasController::class,'listPetugas'])->name('admin.listPetugas');
    Route::post('/test/admin/Petugas/{id}/delete',[adminPetugasController::class,'deletePetugas'])->name('admin.delPetugas');
    Route::get('/test/admin/Petugas/add',PetugasForm::class)->name('admin.addPetugas');
    Route::get('/test/admin/Petugas/{id}',DetailPetugas::class)->name('admin.Petugas');

    Route::get('/test/admin/User',[adminUserController::class,'listPetugas'])->name('admin.listUser');
    Route::get('/test/admin/User/{id}/delete',[adminUserController::class,'deletUser'])->name('admin.delUser');
    Route::get('/test/admin/User/{id}',DetailUser::class)->name('admin.user');

    Route::get('/test/admin/Jadwal',Jadwal::class)->name('admin.jadwal');




});

Route::middleware('petugas')->group(function () {

    //test------------------------------------------------------------------
    Route::get( '/test/dashboard/petugas/',Dashboard::class)->name('petugas.dashboard');

    Route::get('/test/petugas/sampah/antar',[antarSampahController::class,'listSampah'])->name('petugas.listSampahAntar');
    Route::get('/test/petugas/sampah/antar/{id}',DetailSampahAntar::class)->name('petugas.SampahAntar');



    Route::get('/test/petugas/sampah/ambil',[ambilSampahController::class,'listSampah'])->name('petugas.listSampahAmbil');
    Route::get('/test/petugas/sampah/ambil/{id}',DetailSampahAmbil::class)->name('petugas.SampahAmbil');
    Route::get('/test/petugas/leaderboard',[leaderboardPetugas::class,'leaderboardPetugas'])->name('petugas.leaderboard');



});


Route::middleware('user')->group(function () {

    //test------------------------------------------------------------------
    Route::get('/test/dashboard/user/',[usersDashboardController::class,'dashboard'])->name('user.dashboard');

    Route::get('/test/user/buang/',Formbuang::class)->name('user.formbuang');

    Route::get('/test/user/leaderboard/',[leaderboardController::class,'leaderboard'])->name('user.leaderboard');


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
