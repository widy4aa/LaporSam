<?php

namespace App\Livewire\Admin;

use App\Models\kecamatan;
use App\Models\petugas;
use App\Models\tempat_pembuangan;
use App\Models\User;
use Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;


class AddPetugas extends Component
{

        use WithFileUploads;

        public $step = 1;
        public $forUser = [
            'name' => '',
            'username' => '',
            'id_kecamatan' => '',
            'alamat_lengkap' => '',
            'password' => '',
        ];

        public $forPetugas = [
            'id_tempat_pembuangan' => '',
            'status' => '',
            'role' => '',
        ];
        public $userId;
        public $tempatPembuangans;
        public $kecamatans;

    public function mount(){
        $this->tempatPembuangans = tempat_pembuangan::all();
        $this->kecamatans = kecamatan::all();
    }

    public function save()
    {
            $this->validate([
            'forUser.name' => 'required|string|max:255',
            'forUser.username' => 'required|string|max:255|unique:users,username',
            'forUser.id_kecamatan' => 'required|exists:kecamatans,id',
            'forUser.alamat_lengkap' => 'required|string',
            'forUser.password' => 'required|string|min:8',

            'forPetugas.id_tempat_pembuangan' => 'required|exists:tempat_pembuangans,id',
            'forPetugas.status' => ['required', Rule::in(['rest', 'siaga', 'cuti'])],
            'forPetugas.role' => ['required', Rule::in(['lapangan', 'penjaga'])],
        ]);

        $user= User::create([
            'name' => $this->forUser['name'],
            'username' => $this->forUser['username'],
            'id_kecamatan' => $this->forUser['id_kecamatan'],
            'alamat_lengkap' => $this->forUser['alamat_lengkap'],
            'password' => Hash::make($this->forUser['password']),
            'link_gambar' => 'images/user/defaultPetugas.png',
            'point' => 0,
            'location' => null,
            'role' => 'petugas'
        ]);

        petugas::create([
            'id_user' => $user->id,
            'id_tempat_pembuangan' => $this->forPetugas['id_tempat_pembuangan'],
            'status' => $this->forPetugas['status'],
            'role' => $this->forPetugas['role'],
        ]);

        session()->flash('success', 'Petugas berhasil dibuat.');

       return redirect()->route(route: 'admin.listPetugas');
    }

    public function back(){
        return redirect()->route(route: 'admin.listPetugas');
    }
    public function render()
    {
        return view('livewire.admin.add-petugas');
    }
}
