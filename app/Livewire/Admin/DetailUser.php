<?php

namespace App\Livewire\Admin;

use App\Models\User;
use DB;
use Livewire\Component;

class DetailUser extends Component
{

    public $user ;

    public $isEditing = false;
    public $editableData = [];

    public function mount($id){
        $data = User::with('kecamatan')
        ->select('users.*',
        DB::raw('ST_X(location) AS lat'),
        DB::raw('ST_Y(location) AS longt'),)
        ->where('role','=','user')
        ->where('id','=',$id)
        ->get();

        $data=$data[0];

       // dd($data);

        $this->user = [
            'id' => $id,
            'name' => $data->name,
            'username' => $data->username,
            'kecamatan' => $data->kecamatan->kecamatan,
            'alamat_lengkap' => $data->alamat_lengkap,
            'point' => $data->point,
            'id_kecamatan' => $data->id_kecamatan,
            'location' => $data->location_text,
            'lat' =>$data->lat,
            'longt' => $data->longt,
            'link_gambar' =>$data->link_gambar,
            'password' =>'',
        ];

       // dd($this->user);

        $this->editableData = $this->user;
    }
    public function edit()
    {
        $this->isEditing = true;
    }

    public function save(){
        $user = User::find($this->user['id']);

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

        return redirect()->route('admin.listUser');

    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->editableData = $this->user;
    }

    public function render()
    {
        return view('test.admin.detail-user');
    }
}
