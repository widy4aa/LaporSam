<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class userController extends Controller
{
    //
    public function index(){

        $users = DB::table('users')
        ->select('users.id', 'name', 'username', 'link_gambar', 'role', 'location', 'alamat_lengkap','point',
                 DB::raw('ST_X(location) AS lat'),
                 DB::raw('ST_Y(location) AS longt'),
                'kecamatans.kecamatan'
                 )
        ->join('kecamatans', 'users.id_kecamatan', '=', 'kecamatans.id')
        ->orderBy('users.id')
        ->paginate(5);




    return view('testProfile', compact('users'));
    }
}
