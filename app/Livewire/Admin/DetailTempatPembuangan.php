<?php

namespace App\Livewire\Admin;

use App\Models\tempat_pembuangan;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class DetailTempatPembuangan extends Component
{
    use WithFileUploads;

    public $tpsId;
    public $tps;
    public $isEditing = false;
    public $editableData = [];

    public function mount($id)
    {
        $this->tpsId = $id;

        $tempat = tempat_pembuangan::with('kecamatan')->find($this->tpsId);
        $jumlahpetugas = tempat_pembuangan::findOrFail($this->tpsId)->petugas()->count();
        $kordinatPengguna = tempat_pembuangan::find($this->tpsId)
            ->select(
                DB::raw('ST_X(location) AS lat'),
                      DB::raw('ST_Y(location) AS longt'),)
                      ->first();
        $this->tps = [
            'id' => $id,
            'nama' => $tempat->nama,
            'kecamatan' => $tempat->kecamatan->kecamatan,
            'daya_tampung' => $tempat->daya_tampung,
            'deskripsi' => $tempat->deskripsi,
            'link_gambar' => $tempat->link_gambar,
            'jumlahpetugas' => $jumlahpetugas,
            'lat'=> $kordinatPengguna->lat,
            'longt'=> $kordinatPengguna->longt,
        ];

        // Ambil data TPS dari database
        $this->editableData = $this->tps;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function save()
    {

        $this->validate([
            'editableData.nama' => 'required|string',
            'editableData.deskripsi' => 'required|string',
            'editableData.daya_tampung' => 'required|numeric',
        ]);


        if (isset($this->editableData['link_gambar']) && is_object($this->editableData['link_gambar'])) {
            $path = $this->editableData['link_gambar']->store('images/tps');
            $this->editableData['link_gambar'] = $path;
        }
     //   dd($this->editableData['link_gambar']);

        $this->tps = $this->editableData;
       // dd($this->tps['id'] );

        $data = tempat_pembuangan::findOrFail($this->tps['id']);
        $data -> update([
            'nama' => $this->tps['nama'],
            'deskripsi' => $this->tps['deskripsi'],
            'daya_tampung' => $this->tps['daya_tampung'],
            'link_gambar' => $this->tps['link_gambar']
        ]);
        $data->save();

        $this->isEditing = false;

        session()->flash( 'message', 'Data TPS berhasil diperbarui.');
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->editableData = $this->tps;
    }

    public function delete(){
        $data = tempat_pembuangan::findOrFail($this->tpsId);
        $data->delete();

        session()->flash('hapus', 'Data berhasil dihapus.');
        return redirect()->route('admin.listTempatPembuangan');
    }

    public function render()
    {
        return view('livewire.admin.detail-tempat-pembuangan');
    }
}
