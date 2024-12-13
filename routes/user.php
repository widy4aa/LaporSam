<?php

use App\Http\Controllers\user\leaderboardController;
use App\Http\Controllers\user\usersDashboardController;
use App\Livewire\Formbuang;
use App\Livewire\User\FormBuangSampah;
use Illuminate\Support\Facades\Route;

Route::middleware('user')->group(function () {

    //test------------------------------------------------------------------
    Route::get('/test/dashboard/user/',[usersDashboardController::class,'dashboard'])->name('user.dashboard');

    Route::get('/test/user/buang/',FormBuangSampah::class)->name('user.BuangSampah');

    Route::get('/test/user/leaderboard/',[leaderboardController::class,'leaderboard'])->name('user.leaderboard');


});
