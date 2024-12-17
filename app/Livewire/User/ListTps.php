<?php

namespace App\Livewire\User;

use App\Models\tempat_pembuangan;
use Livewire\Component;

class ListTps extends Component
{
    public  $tempat = [] ;

    public $angka;

    public $query = '';

    public function mount(){
        $this->tempat = tempat_pembuangan::where('nama', 'like', value: '%' . $this->query . '%')
        ->get();
    }

    public function search()
    {
        $this->tempat = tempat_pembuangan::where('nama', 'like', value: '%' . $this->query . '%')
        ->get();
    }
    public function render()
    {
        return view('livewire.user.list-tps');
    }
}
