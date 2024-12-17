<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\petugas;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class petugasController extends Controller
{
    //
    public function dashboard(){
        return view('petugas.dashboard');
    }

    public function jobdesk(){
        $dataAuth = Auth::user();

        $data = petugas::with('user')
        ->where('id_user','=',$dataAuth->id)
        ->first()
        ;

        if($data->role == 'lapangan'){
            return view ('petugas.ambil');
        }

         elseif($data->role == 'penjaga'){
            return view ('petugas.antar');
        }

    }
    public function antar($id){
        return view('petugas.Detailantar',compact('id'));
    }

    public function ambil($id){
        return view('petugas.Detailambil',compact('id'));
    }
    public function leaderboard(){
        return view('petugas.leaderboard');
    }

}
