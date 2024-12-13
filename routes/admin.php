<?php

use App\Http\Controllers\admin\adminDashboardController;
use App\Http\Controllers\admin\adminPetugasController;
use App\Http\Controllers\admin\adminTempatPembuanganController;
use App\Http\Controllers\admin\adminUserController;
use App\Livewire\Admin\DetailPetugas;
use App\Livewire\Admin\DetailTempatPembuangan;
use App\Livewire\Admin\DetailUser;
use App\Livewire\Admin\Jadwal;
use App\Livewire\Admin\ListTempatPembuangans;
use App\Livewire\Admin\PetugasForm;
use App\Livewire\Admin\TempatPembuangans;
use Illuminate\Support\Facades\Route;


Route::middleware('admin')->group(function () {

    //test------------------------------------------------------------------

    //Route::get(uri: '/test/dashboard/admin/',[adminDashboardController::class,'dashboard'])->name('admin.dashboard');
    //Route::get('/test/admin/TempatPembuangan',[adminTempatPembuanganController::class,'listTempatPembuangan'])->name('admin.listTempatPembuangan');


    Route::post('/test/admin/TempatPembuangan/add/proses',[adminTempatPembuanganController::class,'addTempatPembuanganProses'])->name('admin.addTempatPembuanganProses');
    Route::get('/test/admin/TempatPembuangan/{id}',DetailTempatPembuangan::class)->name(('admin.TempatPembuangan'));

    Route::get('/test/admin/Petugas',[adminPetugasController::class,'listPetugas'])->name('admin.listPetugas');
    Route::post('/test/admin/Petugas/{id}/delete',[adminPetugasController::class,'deletePetugas'])->name('admin.delPetugas');
    Route::get('/test/admin/Petugas/add',PetugasForm::class)->name('admin.addPetugas');
    Route::get('/test/admin/Petugas/{id}',DetailPetugas::class)->name('admin.Petugas');

    Route::get('/test/admin/User',[adminUserController::class,'listPetugas'])->name('admin.listUser');
    Route::get('/test/admin/User/{id}/delete',[adminUserController::class,'deletUser'])->name('admin.delUser');
    Route::get('/test/admin/User/{id}',DetailUser::class)->name('admin.user');

    Route::get('/test/admin/Jadwal',Jadwal::class)->name('admin.jadwal');


    Route::get('/dashboard/admin/',[adminDashboardController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/TempatPembuangan/',[adminTempatPembuanganController::class,'listTempatPembuangan'])->name('admin.listTempatPembuangan');
    Route::get('/admin/TempatPembuangan/add',[adminTempatPembuanganController::class,'addTempatPembuangan'])->name('admin.addTempatPembuangan');



});
