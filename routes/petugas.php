<?php

use App\Http\Controllers\petugas\ambilSampahController;
use App\Http\Controllers\petugas\antarSampahController;
use App\Http\Controllers\petugas\leaderboardPetugas;
use App\Livewire\Petugas\Dashboard;
use App\Livewire\Petugas\DetailSampahAmbil;
use App\Livewire\Petugas\DetailSampahAntar;
use Illuminate\Support\Facades\Route;

Route::middleware('petugas')->group(function () {

    //test------------------------------------------------------------------
    Route::get( '/test/dashboard/petugas/',Dashboard::class)->name('petugas.dashboard');

    Route::get('/test/petugas/sampah/antar',[antarSampahController::class,'listSampah'])->name('petugas.listSampahAntar');
    Route::get('/test/petugas/sampah/antar/{id}',DetailSampahAntar::class)->name('petugas.SampahAntar');



    Route::get('/test/petugas/sampah/ambil',[ambilSampahController::class,'listSampah'])->name('petugas.listSampahAmbil');
    Route::get('/test/petugas/sampah/ambil/{id}',DetailSampahAmbil::class)->name('petugas.SampahAmbil');
    Route::get('/test/petugas/leaderboard',[leaderboardPetugas::class,'leaderboardPetugas'])->name('petugas.leaderboard');



});
