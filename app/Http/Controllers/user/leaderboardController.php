<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class leaderboardController extends Controller
{
    //
    public function leaderboard(){
        $users = DB::table('users')
        ->select('name', 'point', 'kecamatans.kecamatan')
        ->join('kecamatans', 'users.id_kecamatan', '=', 'kecamatans.id')
        ->where('users.role', '=', 'user')
        ->orderBy('point', 'desc')
        ->paginate(8)
        ;

        return view('test.users.leaderboard',compact('users'));
    }
}
