<?php

namespace App\Livewire\User;

use App\Models\sampah;
use Auth;
use DB;
use Livewire\Component;

class History extends Component
{
    public $history_sampah;
    public function mount(){
        $profile = Auth::user();

        $history_sampah = DB::table('sampahs')
        ->select(
            'sampahs.id',
            'sampahs.id_pengguna',
            'sampahs.id_petugas',
            'sampahs.metode',
            'sampahs.status',
            'sampahs.berat',
            'pengguna.name as nama_pengguna',
            'petugas_user.name as nama_petugas',
            'tempat_pembuangans.nama as tempat_pembuangan'
        )
        ->join('users as pengguna', 'pengguna.id', '=', 'sampahs.id_pengguna')
        ->join('tempat_pembuangans','sampahs.id_tempat_pembuangan','=','tempat_pembuangans.id')
        ->leftJoin('petugas', 'petugas.id', '=', 'sampahs.id_petugas')
        ->leftJoin('users as petugas_user', 'petugas_user.id', '=', 'petugas.id_user')
        ->where('sampahs.id_pengguna', '=', $profile->id)
        ->get();

        $this->history_sampah = $history_sampah;

    }
    public function render()
    {
        return view('livewire.user.history');
    }
}
