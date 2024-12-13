<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Jadwal extends Component
{
    public $waktu_mulai;
    public $waktu_selesai;

    public $jadwals = [];

    public function mount()
    {
        $this->loadJadwal();
    }

    public function loadJadwal()
    {
        $this->jadwals = \App\Models\jadwal::all();
    }

    public function addJadwal()
    {
        $this->validate([
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        \App\Models\jadwal::create([
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_berakhir' => $this->waktu_selesai,
        ]);

        $this->reset(['waktu_mulai', 'waktu_selesai']);
        $this->loadJadwal();
    }

    public function deleteJadwal($id)
    {
        \App\Models\jadwal::findOrFail($id)->delete();
        $this->loadJadwal();
    }

    public function render()
    {
        return view('test.admin.jadwal');
    }
}
