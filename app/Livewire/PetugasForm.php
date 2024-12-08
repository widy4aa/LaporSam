<?php

namespace App\Livewire;

use App\Models\kecamatan;
use App\Models\petugas;
use App\Models\tempat_pembuangan;
use App\Models\User;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class PetugasForm extends Component
{
    use WithFileUploads;

    // Step management
    public $step = 1;

    // Data for user
    public $forUser  = [];
    public $forPetugas  = [];
    public $userId;
    public $tempatPembuangans;
    public $kecamatans;

    public function mount()
    {
        $this->tempatPembuangans = tempat_pembuangan::all();
        $this->kecamatans = kecamatan::all();
    }

    public function nextStep()
    {
       // dd($this->forUser);
        if ($this->step === 1) {
            $user = User::create([
                'name' => $this->forUser['name'],
                'username' => $this->forUser['username'],
                'id_kecamatan' => $this->forUser['id_kecamatan'],
                'alamat_lengkap' => $this->forUser['alamat_lengkap'],
                'link_gambar' => 'https://via.placeholder.com/640x480.png/00cc66?text=eum',
                'password' => bcrypt($this->forUser['password']),
                'role' => 'petugas',
                'point' => 0,
                'location' => DB::raw("ST_GeomFromText('POINT(-8.162420536873308 113.72379662466008)')"),

            ]);

            $this->userId = $user->id;
            $this->step = 2;
        }
    }

    public function savePetugas()
    {
        // Simpan data petugas
        Petugas::create([
            'id_user' => $this->userId,
            'id_tempat_pembuangan' => $this->forPetugas['id_tempat_pembuangan'],
            'status' => $this->forPetugas['status'],
            'role' => $this->forPetugas['role'],
        ]);

        return redirect()->route('admin.listPetugas');
    }

    public function render()
    {
        return view('test.admin.petugas-form');
    }
}
