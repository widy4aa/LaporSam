<?php

namespace App\Livewire\Petugas;

use App\Models\User;
use Auth;
use Livewire\Component;

class Leaderboard extends Component
{
    public $petugas;
    public function mount(){
        $profile = Auth::user();

        $this->petugas = User::with('petugas','kecamatan','petugas.tempat_pembuangan')
        ->where('role' ,'=','petugas')
        ->orderBy('point','desc')
        ->get()
        ;
    }
    public function render()
    {
        return view('livewire.petugas.leaderboard');
    }
}
