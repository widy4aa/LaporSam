<?php

namespace App\Livewire\User;

use Auth;
use DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $history_sampah;
    public function mount(){
        $username = Auth::user()->username;
        $profile = DB::table('users')
        ->select('id','name','username','role')
        ->where('users.username','=',$username)
        ->first()
        ;


        $history_sampah = DB::table('sampahs')
        ->select(
            'sampahs.id',
            'sampahs.id_pengguna',
            'sampahs.id_petugas',
            'sampahs.metode',
            'sampahs.status',
            'sampahs.berat',
            'pengguna.name as nama_pengguna',
            'petugas_user.name as nama_petugas'
        )
        ->join('users as pengguna', 'pengguna.id', '=', 'sampahs.id_pengguna')
        ->leftJoin('petugas', 'petugas.id', '=', 'sampahs.id_petugas')
        ->leftJoin('users as petugas_user', 'petugas_user.id', '=', 'sampahs.id_petugas')
        ->where('sampahs.id_pengguna', '=', $profile->id)
        ->where('sampahs.status', '!=', 'selesai')
        ->get();

        $this->history_sampah = $history_sampah;
    }

    public function history(){
        return redirect()->route('user.history');
    }

    public function buang(){
        return redirect()->route('user.buang');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
