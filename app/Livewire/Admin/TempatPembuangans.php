<?php

namespace App\Livewire\Admin;

use App\Models\tempat_pembuangan;
use App\Models\User;
use Livewire\Component;

class TempatPembuangans extends Component
{
    public  $tempat = [] ;

    public $angka;

    public $query = '';

    public function mount(){

    }

    public function search()
    {
        $this->tempat = tempat_pembuangan::where('nama', 'like', value: '%' . $this->query . '%')
        ->get();
    }

    public function addTempat()
    {
        return redirect()->route('admin.addTempatPembuangan');
    }

    public function render()
    {
        return view('livewire.admin.tempat-pembuangans',
        ['tempats'=> tempat_pembuangan::where('nama', 'like', value: '%' . $this->query . '%')
        ->get()]);
    }

}
