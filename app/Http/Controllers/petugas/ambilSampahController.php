<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\sampah;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ambilSampahController extends Controller
{
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

        if ($profile['role']== 'lapangan'){
            $sampahs= Sampah::with('User')
            ->where('id_petugas', '=', $profile['id_petugas'] )
            ->where('status', '!=', 'selesai')
            ->where('metode','=', 'ambil')
            ->get()
            ;
        }

        return view('test.petugas.listSampahAmbil',compact('sampahs','profile'));

    }
}
