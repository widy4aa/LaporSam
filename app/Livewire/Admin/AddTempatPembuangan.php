<?php

namespace App\Livewire\Admin;

use App\Models\kecamatan;
use App\Models\tempat_pembuangan;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddTempatPembuangan extends Component
{
    use WithFileUploads;
    public $dataTempat ;
    public $dataKecamatan;

    public function mount(){
        $this->dataTempat = [
            'nama' => '',
            'deskripsi' => '',
            'daya_tampung' => '',
            'jenis' => '',
            'link_gambar' => '',
            'id_kecamatan' => '',
            'location' => '',
        ];

        $this->dataKecamatan = kecamatan::all();
    }

    public function save(){
        $this->validate([
            'dataTempat.nama' => 'required|string|min:3|max:100',
            'dataTempat.deskripsi' => 'required|string|min:10|max:500',
            'dataTempat.daya_tampung' => 'required|integer|min:1|max:10000',
            'dataTempat.jenis' => 'required|in:TPA,TPS',
            'dataTempat.link_gambar' => 'required|image|max:2048',
            'dataTempat.id_kecamatan' => 'required|integer|exists:kecamatans,id',
            'dataTempat.location' => 'required|regex:/^[-+]?\d{1,3}\.\d+,[-+]?\d{1,3}\.\d+$/',
        ]);

        if (isset($this->dataTempat['link_gambar']) && is_object($this->dataTempat['link_gambar'])) {
            $path = $this->dataTempat['link_gambar']->store('images/tps');
            $this->dataTempat['link_gambar'] = $path;
        }

        $coordinates = explode(',', $this->dataTempat['location']);
        $latitude = trim($coordinates[0]);
        $longitude = trim($coordinates[1]);
        tempat_pembuangan :: create([
            'nama' => $this->dataTempat['nama'],
            'deskripsi' => $this->dataTempat['deskripsi'],
            'daya_tampung' => $this->dataTempat['daya_tampung'],
            'jenis' => $this->dataTempat['jenis'],
            'link_gambar' => $path,
            'id_kecamatan' =>$this->dataTempat['id_kecamatan'],
            'location' => DB::raw("ST_GeomFromText('POINT($longitude $latitude)')")
      ]);

      return redirect()->route('admin.listTempatPembuangan');

    }
    public function render()
    {
        return view('livewire.admin.add-tempat-pembuangan');
    }
}
