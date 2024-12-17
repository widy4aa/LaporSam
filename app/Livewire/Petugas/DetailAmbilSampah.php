<?php

namespace App\Livewire\Petugas;

use App\Models\sampah;
use App\Models\User;
use Auth;
use DB;
use Livewire\Component;

class DetailAmbilSampah extends Component
{
    public $isEditing = false;
    public $dataAuth ;
    public $dataProfile ;

    public $dataSampah;

    public $sampah;
    public $profile = [];

    public $editableData = [];

    public $sampahId;

    public function mount($id){

        $this->sampahId = $id;

        $this->dataAuth = Auth::user();
        $this->dataProfile = User::with(
            'kecamatan',
            'petugas',
            'petugas.tempat_pembuangan',
            'petugas.jadwal_petugas'
        )
        ->where('role', 'petugas')
        ->where('id', $this->dataAuth->id)
        ->first();


        $this->profile =[
            'nama' => $this->dataProfile->name,
            'username' => $this->dataProfile->username,
            'id_user' => $this->dataProfile->id,
            'id_petugas' =>$this->dataProfile->petugas[0]->id,
            'status' => $this->dataProfile->petugas[0]->status,
            'tempat_pembuangan' => $this->dataProfile->petugas[0]->tempat_pembuangan->nama,
            'id_tempat_pembuangan' => $this->dataProfile->petugas[0]->tempat_pembuangan->id,
            'role' => $this->dataProfile->petugas[0]->role,
        ];

       // dd($this->profile['id_tempat_pembuangan']);

        $this->status = $this->profile['status'];

        $this->profile['jadwals'] = User::with(
            'petugas',
            'petugas.jadwal_petugas',
            'petugas.jadwal_petugas.jadwal'
            )
            ->where('role', 'petugas')
            ->where('id', $this->dataAuth->id)
            ->get();
            ;

        $this->profile['jadwals']=$this->profile['jadwals'][0]->petugas[0]->jadwal_petugas;


        $id_petugas =$this->profile['id_petugas'];

        if ($this->profile['role'] == 'lapangan'){
            $this->dataSampah = Sampah::with('User')
            ->where('id_petugas', '=', $id_petugas )
            ->where('status', '!=', 'selesai')
            ->where('metode','=', 'ambil')
            ->where('id','=',$this->sampahId)
            ->first()
            ;


            $kordinatPengguna = User::find($this->dataSampah->id_pengguna)
            ->select(
                DB::raw('ST_X(location) AS lat'),
                      DB::raw('ST_Y(location) AS longt'),)
                      ->first();

        }

        $this->sampah = [
            "id" => $this->dataSampah->id,
            "id_pengguna" => $this->dataSampah->id_pengguna,
            "id_petugas" => $this->dataSampah->id_petugas,
            "id_tempat_pembuangan" => $this->dataSampah->id_tempat_pembuangan,
            "id_jadwal" => $this->dataSampah->id_jadwal,
            "metode" => $this->dataSampah->metode,
            "status" => $this->dataSampah->status,
            "berat" => $this->dataSampah->berat,
            "created_at" => $this->dataSampah->created_at,
            "tempat_pembuangan" => $this->dataSampah->tempat_pembuangan->nama,
            "nama_pembuang" => $this->dataSampah->User->name,
            "lat" => $kordinatPengguna->lat,
            "longt" => $kordinatPengguna->longt,
            "kecamatan" => $this->dataSampah->User->kecamatan->kecamatan
        ];

        $this->editableData = $this->sampah;

    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->editableData = $this->sampah;
    }

    public function save()
    {

        $this->sampah = $this->editableData;

        $sampah = sampah::findOrFail($this->sampah['id']);
        $sampah ->update([
            'berat' => $this->sampah['berat'],
            'status' => 'selesai',
            'id_petugas' => $this->profile['id_petugas'],
            'id_tempat_pembuangan' => $this->profile['id_tempat_pembuangan']
        ]);
        $sampah->save();

        $poinUser = User::where('id','=',$this->sampah['id_pengguna'])->first();
        $poinUser = $poinUser->point + 25;

        $user = User::findOrFail($this->sampah['id_pengguna']);
        $user ->update([
            'point' => $poinUser ,
        ]);
        $user->save();

        $poinPetugas = User::where('id','=',$this->profile['id_user'])->first();
        $poinPetugas = $poinPetugas->point + 25;


        $petugas = User::findOrFail($this->dataProfile->id);
        $petugas -> update([
            'point' => $poinPetugas ,
        ]);
        $petugas->save();

        $this->isEditing = false;

        session()->flash('message', 'Data TPS berhasil diperbarui.');

        return redirect()->route(route: 'petugas.jobdesk');
    }

    public function render()
    {
        return view('livewire.petugas.detail-ambil-sampah');
    }
}
