<?php

namespace App\Livewire\Admin;

use App\Models\tempat_pembuangan;
use App\Models\User;
use Hash;
use Livewire\Component;

class Client extends Component
{
    public $userID;

    public $client;
    public $isEditing = false;
    public $editableData = [];

        public function mount($id)
        {
        $data = User::with('kecamatan')
            ->where('id', '=', $id)
            ->first();

        $this->userID = $data->id;

        $this->TempatPembuangan = tempat_pembuangan::get();

        $this->client = [
            'id' => $data->id,
            'name' => $data->name,
            'username' => $data->username,
            'kecamatan' => $data->kecamatan->kecamatan,
            'alamat_lengkap' => $data->alamat_lengkap,
            'point' => $data->point,
            'id_kecamatan' => $data->id_kecamatan,
            'link_gambar' => $data->link_gambar,
            'password' => '',
        ];

        $this->editableData = $this->client;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function save()
    {
            $this->validate([
            'editableData.username' => 'required|string|max:255|unique:users,username,' . $this->client['id'],
            'editableData.password' => 'nullable|string|min:8',
        ]);


        $user = User::find($this->client['id']);


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

        session()->flash('success', 'Data client berhasil diperbarui.');

        return redirect()->route('admin.client', ['id' => $this->userID]);
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->editableData = $this->client;
    }

    public function delete(){
    try
      {
        $user = User::find($this->userID);
        if ($user) {
            $user->delete();
        }

        session()->flash('deleteDone', 'client berhasil dihapus.');
     }

    catch (\Exception $e) {
        session()->flash('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
    }
        return redirect()->route('admin.listClient');

    }


    public function render()
    {
        return view('livewire.admin.client');
    }
}
