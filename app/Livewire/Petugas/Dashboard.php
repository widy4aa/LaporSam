<?php

namespace App\Livewire\Petugas;

use App\Livewire\admin\Jadwal;
use App\Models\petugas;
use App\Models\sampah;
use App\Models\User;
use Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $dataAuth ;
    public $dataProfile ;

    public $status ;
    public $profile = [];

    public function mount(){
        $this->dataAuth = Auth::user();
        $this->dataProfile = User::with(
            'kecamatan',
            'petugas',
            'petugas.tempat_pembuangan',
            'petugas.jadwal_petugas'
        )
        ->where('role', 'petugas')
        ->where('id', $this->dataAuth->id)
        ->first();


        $this->profile =[
            'nama' => $this->dataProfile->name,
            'username' => $this->dataProfile->username,
            'id_user' => $this->dataProfile->id,
            'id_petugas' =>$this->dataProfile->petugas[0]->id,
            'status' => $this->dataProfile->petugas[0]->status,
            'tempat_pembuangan' => $this->dataProfile->petugas[0]->tempat_pembuangan->nama,
            'id_tempat_pembuangan' => $this->dataProfile->petugas[0]->tempat_pembuangan->id,
            'role' => $this->dataProfile->petugas[0]->role,
        ];

       // dd($this->profile['id_tempat_pembuangan']);

        $this->status = $this->profile['status'];

        $this->profile['jadwals'] = User::with(
            'petugas',
            'petugas.jadwal_petugas',
            'petugas.jadwal_petugas.jadwal'
            )
            ->where('role', 'petugas')
            ->where('id', $this->dataAuth->id)
            ->get();
            ;

        $this->profile['jadwals']=$this->profile['jadwals'][0]->petugas[0]->jadwal_petugas;


        $id_petugas =$this->profile['id_petugas'];


        if ($this->profile['role'] == 'penjaga'){
            $this->profile['sampahs'] = Sampah::with('tempat_pembuangan','User')
            ->where('id_tempat_pembuangan','=',$this->profile['id_tempat_pembuangan'])
            ->where('status', '!=', 'selesai')
            ->where('metode','=', 'antar')
            ->get()
            ;
        }

        elseif ($this->profile['role']== 'lapangan'){
            $this->profile['sampahs'] = Sampah::with('User')
            ->where('id_petugas', '=', $id_petugas )
            ->where('status', '!=', 'selesai')
            ->where('metode','=', 'ambil')
            ->get()
            ;
        }

    }

    public function saveStatus()
    {
        // Validasi input
        $this->validate([
            'status' => 'required|in:cuti,rest,siaga',
        ]);

        try {

            $petugas = petugas::find(id: $this->profile['id_petugas']);
            $petugas->status = $this->status;
            $petugas->save();

            session()->flash('success', 'Status berhasil diperbarui.');
        } catch (\Exception $e) {

            session()->flash('error', 'Gagal memperbarui status. Silakan coba lagi.');
        }
    }


    public function render()
    {
        return view('test.petugas.dashboard');
    }


}
