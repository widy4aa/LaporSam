<?php

namespace App\Livewire\Admin;

use App\Models\jadwal;
use Livewire\Component;

class ListJadwals extends Component
{
    public $jadwal;

    public $jadwalAdd = [
        'waktu_mulai' => '',
        'waktu_berakhir' => '',
    ];

    public function mount(){
        $jadwal = jadwal::all();
        $this->jadwal = $jadwal;
    }
    public function render()
    {
        return view('livewire.admin.list-jadwals');
    }

    public function save(){
        $this->validate([
            'jadwalAdd.waktu_mulai' => 'required|date_format:H:i',
            'jadwalAdd.waktu_berakhir' => 'required|date_format:H:i|after:jadwalAdd.waktu_mulai',
        ]);

        Jadwal::create([
            'waktu_mulai' => $this->jadwalAdd['waktu_mulai'],
            'waktu_berakhir' => $this->jadwalAdd['waktu_berakhir'],
        ]);

        session()->flash('success', 'Jadwal berhasil ditambahkan.');

        return redirect()->route('admin.jadwal');


    }

    public function delete(){
        
    }
}
