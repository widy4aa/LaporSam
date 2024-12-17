<?php

namespace App\Livewire\Petugas;

use App\Models\sampah;
use App\Models\User;
use Auth;
use Livewire\Component;

class AmbilSampah extends Component
{
    public $sampahs;
    public function mount(){
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
            $this->sampahs= sampah::with('User')
            ->where('id_petugas', '=', $profile['id_petugas'] )
            ->where('status', '!=', 'selesai')
            ->where('metode','=', 'ambil')
            ->get()
            ;
        }
    }
    public function render()
    {
        return view('livewire.petugas.ambil-sampah');
    }
}
