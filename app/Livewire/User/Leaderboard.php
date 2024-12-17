<?php

namespace App\Livewire\User;

use App\Models\User;
use Auth;
use Livewire\Component;

class Leaderboard extends Component
{
    public $petugas;
    public function mount(){
        $profile = Auth::user();

        $this->petugas = User::with('kecamatan')
        ->where('role' ,'=','user')
        ->orderBy('point','desc')
        ->get()
        ;
    }
    public function render()
    {
        return view('livewire.user.leaderboard');
    }
}
