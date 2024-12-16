<?php

namespace App\Livewire\Admin;

use App\Models\petugas;
use Livewire\Component;

class ListPetugas extends Component
{

    public  $petugas = [] ;

    public $angka;

    public $query = '';

    public function mount(){
        $this->petugas = Petugas::with('user', 'user.kecamatan')
        ->whereHas('User', function ($query) {
            $query->where('name', 'like', '%' . $this->query . '%');
        })
        ->get();

    }

    public function search()
    {
        $this->petugas = Petugas::with('user', 'user.kecamatan')
        ->whereHas('User', function ($query) {
            $query->where('name', 'like', '%' . $this->query . '%');
        })
        ->get();

    }

    public function addTempat()
    {
        return redirect()->route('admin.addPetugas');
    }

    public function render()
    {
        return view('livewire.admin.list-petugas');
    }

}
