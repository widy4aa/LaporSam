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

    Route::get('/test/admin/User',[adminUserController::class,'listPetugas'])->name('admin.listUser');
    Route::get('/test/admin/User/{id}/delete',[adminUserController::class,'deletUser'])->name('admin.delUser');
    Route::get('/test/admin/User/{id}',DetailUser::class)->name('admin.user');

    Route::get('/test/admin/Jadwal',Jadwal::class)->name('admin.jadwal');

    Route::get('/dashboard/admin/',[adminDashboardController::class,'dashboard'])->name('admin.dashboard');

    Route::get('/admin/TempatPembuangan/',[adminTempatPembuanganController::class,'listTempatPembuangan'])->name('admin.listTempatPembuangan');
    Route::get('/admin/TempatPembuangan/add',[adminTempatPembuanganController::class,'addTempatPembuangan'])->name('admin.addTempatPembuangan');
    Route::get('/admin/TempatPembuangan/{id}',[adminTempatPembuanganController::class,'DetailTempatPembuangan'])->name(('admin.TempatPembuangan'));


    Route::get('/admin/petugas/',[adminPetugasController::class,'listPetugas'])->name('admin.listPetugas');
    Route::get('/admin/petugas/add',[adminPetugasController::class,'addPetugas'])->name('admin.addPetugas');
    Route::get('/admin/petugas/{id}',[adminPetugasController::class,'petugas'])->name('admin.petugas');

    Route::get('/admin/client/',[adminUserController::class,'listClient'])->name('admin.listClient');
    Route::get('/admin/client/add',[adminUserController::class,'addClient'])->name('admin.addClient');
    Route::get('/admin/client/{id}',[adminUserController::class,'client'])->name('admin.client');
    Route::get('/admin/jadwals',[\App\Http\Controllers\admin\Jadwal::class,'listJadwal'])->name('admin.jadwal');

    Route::get('/admin/profile', function () {
       return view('admin.profile');
     })->name('admin.profile');


});
