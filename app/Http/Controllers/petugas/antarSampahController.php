<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\sampah;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class antarSampahController extends Controller
{
    //
    public function listSampah(){
        $dataAuth = Auth::user();

        $dataProfile = User::with(
            'kecamatan',
            'petugas',
            'petugas.tempat_pembuangan',
            'petugas.jadwal_petugas'
        )
        ->where('role', 'petugas')
        ->where('id', $dataAuth->id)
        ->first();


        $profile =[
            'nama' => $dataProfile->name,
            'username' => $dataProfile->username,
            'id_user' => $dataProfile->id,
            'id_petugas' =>$dataProfile->petugas[0]->id,
            'status' => $dataProfile->petugas[0]->status,
            'tempat_pembuangan' => $dataProfile->petugas[0]->tempat_pembuangan->nama,
            'id_tempat_pembuangan' => $dataProfile->petugas[0]->tempat_pembuangan->id,
            'role' => $dataProfile->petugas[0]->role,
        ];

        if ($profile['role'] == 'penjaga'){
            $sampahs= Sampah::with('tempat_pembuangan','User')
            ->where('id_tempat_pembuangan','=',$profile['id_tempat_pembuangan'])
            ->where('status', '!=', 'selesai')
            ->where('metode','=', 'antar')
            ->get()
            ;
        }

        return view('test.petugas.listSampahAntar',compact('sampahs','profile'));

    }
}
