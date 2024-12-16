<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Auth;
use Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;


    public $userID;

    public $client;
    public $isEditing = false;
    public $editableData = [];

        public function mount(){
        $data = Auth::user();

        $this->userID = $data->id;
        $this->client = [
            'id' => $data->id,
            'name' => $data->name,
            'username' => $data->username,
            'kecamatan' => $data->kecamatan->kecamatan,
            'alamat_lengkap' => $data->alamat_lengkap,
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

        if (isset($this->editableData['link_gambar']) && is_object($this->editableData['link_gambar'])) {
            $path = $this->editableData['link_gambar']->store('images/user');
            $this->editableData['link_gambar'] = $path;
        }

        $this->client = $this->editableData;


        if ($this->editableData['password']) {
            $user->update([
                'name' => $this->editableData['name'],
                'username' => $this->editableData['username'],
                'password' => Hash::make($this->editableData['password']),
                'link_gambar' => $path
            ]);
        }

        else {
            $user->update([
                'name' => $this->editableData['name'],
                'username' => $this->editableData['username'],
                'link_gambar' => $path
            ]);
        }


        session()->flash('success', 'Data Profile berhasil diperbarui.');

        return redirect()->route('admin.profile');
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->editableData = $this->client;
    }

    public function render()
    {
        return view('livewire.admin.profile');
    }
}
