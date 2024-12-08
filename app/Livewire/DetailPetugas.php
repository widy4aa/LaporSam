<?php

namespace App\Livewire;

use App\Models\petugas;
use App\Models\tempat_pembuangan;
use App\Models\User;
use Livewire\Component;

class DetailPetugas extends Component
{
    public $petugas ;

    public $TempatPembuangan;

    public $isEditing = false;
    public $editableData = [];

    public function mount($id){
        $data = User::with('kecamatan','petugas','petugas.tempat_pembuangan')
        ->where('role','=','petugas')
        ->where('id','=',$id)
        ->get();

        $data=$data[0];
        $this->TempatPembuangan = tempat_pembuangan::get();

        $this->petugas = [
            'id' => $id,
            'name' => $data->name,
            'username' => $data->username,
            'kecamatan' => $data->kecamatan->kecamatan,
            'alamat_lengkap' => $data->alamat_lengkap,
            'point' => $data->point,
            'id_kecamatan' => $data->id_kecamatan,
            'tempat_pembuangan' => $data->petugas[0]->tempat_pembuangan->nama,
            'id_tempat_pembuangan' => $data->petugas[0]->tempat_pembuangan->id,
            'role' => $data->petugas[0]->role,
            'status' => $data->petugas[0]->status,
            'link_gambar' =>$data->link_gambar,
            'password' =>'',
            'id_petugas'=>$data->petugas[0]->id,
        ];


        $this->editableData = $this->petugas;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function save(){
        $user = User::find($this->petugas['id']);

        if ($this->editableData['password']){
            $user->update([
            'username'=> $this->editableData['username'],
            'password'=> bcrypt($this->editableData['password'])
        ]);
        }

        else{
            $user->update([
                'username'=> $this->editableData['username'],
            ]);
        }

        $user->save();

        $petugas = petugas::find($this->petugas['id_petugas']);
        $petugas->update([
            'id_tempat_pembuangan' => $this->editableData['id_tempat_pembuangan'],
            'role' => $this->editableData['role'],
        ]);

        $petugas->save();

        return redirect()->route('admin.listPetugas');

    }
    public function cancel()
    {
        $this->isEditing = false;
        $this->editableData = $this->petugas;
    }

    public function render()
    {
        return view('test.admin.detail-petugas');
    }
}
