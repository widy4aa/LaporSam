<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class usersDashboardController extends Controller
{
    public function dashboard(Request $request){

        $username = Auth::user()->username;
        $profile = DB::table('users')
        ->select('id','name','username','role')
        ->where('users.username','=',$username)
        ->first()
        ;
        if (!$profile ||$profile->role != 'user') {
            abort(404, 'User not found');
        }


        $history_sampah = DB::table('sampahs')
        ->select(
            'sampahs.id',
            'sampahs.id_pengguna',
            'sampahs.id_petugas',
            'sampahs.metode',
            'sampahs.status',
            'sampahs.berat',
            'pengguna.name as nama_pengguna',
            'petugas_user.name as nama_petugas'
        )
        ->join('users as pengguna', 'pengguna.id', '=', 'sampahs.id_pengguna')
        ->leftJoin('petugas', 'petugas.id', '=', 'sampahs.id_petugas')
        ->leftJoin('users as petugas_user', 'petugas_user.id', '=', 'petugas.id_user')
        ->where('sampahs.id_pengguna', '=', $profile->id)
        ->where('sampahs.status', '!=', 'selesai')
        ->paginate(5);


        return view('test.users.dashboard', compact('history_sampah', 'profile'));

    }
}
