<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\petugas;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class leaderboardPetugas extends Controller
{
    //

    public function leaderboardPetugas(){
        $profile = Auth::user();

        $petugas = User::with('petugas','kecamatan','petugas.tempat_pembuangan')
        ->where('role' ,'=','petugas')
        ->orderBy('point','desc')
        ->get()
        ;

        return view('test.petugas.leaderboard',compact('profile','petugas'));
    }

}
