<?php

namespace App\Livewire;

use App\Models\kecamatan;
use App\Models\User;
use Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $username, $alamat_lengkap, $link_gambar, $role = 'user', $password, $password_confirmation;
    public $id_kecamatan, $remember_token, $location;

    public $dataKecamatan;


    public function mount(){
        $this->dataKecamatan = kecamatan::all();
    }

    public function register()
    {
        // Validasi data input
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'alamat_lengkap' => 'required|string',
            'password' => 'required|confirmed|min:8',
            'id_kecamatan' => 'nullable|numeric',
        ]);

        // Simpan ke database
        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'alamat_lengkap' => $this->alamat_lengkap,
            'link_gambar' => 'images/user/hyg5Bhr8nJnZkd85DXl8Nm4TvtlMIIeipg30kQXA.png',
            'role' => $this->role,
            'point'=> 0,
            'password' => Hash::make($this->password),
            'id_kecamatan' => $this->id_kecamatan,
            'remember_token' => \Str::random(10),
            
        ]);

        // Reset form dan tampilkan notifikasi
        session()->flash('message', 'Registrasi berhasil!');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.register');
    }
}
