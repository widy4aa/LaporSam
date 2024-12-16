<?php

namespace App\Livewire\Admin;

use App\Models\tempat_pembuangan;
use App\Models\User;
use Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Petugas extends Component
{

    public $petugas ;

    public $userID;
    public $petugasID;

    public $TempatPembuangan;

    public $isEditing = false;
    public $editableData = [];

        public function mount($id)
        {
        $data = User::with('kecamatan','petugas','petugas.tempat_pembuangan')
            ->where('role', '=', 'petugas')
            ->whereHas('petugas', function ($query) use ($id) {
                $query->where('id', '=', $id);
            })
            ->first();

        $this->userID = $data->id;
        $this->petugasID = $data->petugas[0]->id;

        $this->TempatPembuangan = tempat_pembuangan::get();

        $this->petugas = [
            'id' => $data->id,
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
            'link_gambar' => $data->link_gambar,
            'password' => '',
            'id_petugas' => $data->petugas[0]->id,
        ];

        $this->editableData = $this->petugas;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function save()
    {
            $this->validate([
            'editableData.username' => 'required|string|max:255|unique:users,username,' . $this->petugas['id'],
            'editableData.password' => 'nullable|string|min:8',
            'editableData.id_tempat_pembuangan' => 'required|exists:tempat_pembuangans,id',
            'editableData.role' => ['required', Rule::in(['lapangan', 'penjaga'])],
        ]);

        //dd($this->editableData);
        //dd($this->petugas);

        $user = User::find($this->petugas['id']);


        if ($this->editableData['password']) {
            $user->update([
                'username' => $this->editableData['username'],
                'password' => Hash::make($this->editableData['password']),
            ]);
        }

        else {
            $user->update([
                'username' => $this->editableData['username'],
            ]);
        }

        $petugas = \App\Models\petugas::find($this->petugas['id_petugas']);
        $petugas->update([
            'id_tempat_pembuangan' => $this->editableData['id_tempat_pembuangan'],
            'role' => $this->editableData['role'],
        ]);

        session()->flash('success', 'Data Petugas berhasil diperbarui.');

        return redirect()->route('admin.petugas', ['id' => $this->petugasID]);
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->editableData = $this->petugas;
    }

    public function delete(){
    try
      {
        $user = User::find($this->userID);
        if ($user) {
            $user->delete();
        }

        $petugas = \App\Models\petugas::find($this->petugasID);
        if ($petugas) {
            $petugas->delete();
        }

        session()->flash('deleteDone', 'Petugas berhasil dihapus.');
     }

    catch (\Exception $e) {
        // Flash message untuk notifikasi error
        session()->flash('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
    }
        return redirect()->route('admin.listPetugas');

    }


    public function render()
    {
        return view('livewire.admin.petugas');
    }
}
