<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class ListClient extends Component
{
    public  $client = [] ;

    public $angka;

    public $query = '';

    public function mount(){
        $this->client = User::with ('kecamatan')
        ->where('role' ,'=','user')
        ->get();

    }

    public function search()
    {

        $this->client = User::with ('kecamatan')
        ->where('role' ,'=','user')
        ->where('name', 'like', '%' . $this->query . '%')
        ->get();


    }

    public function addClient()
    {
        return redirect()->route('admin.addClient');
    }

    public function render()
    {
        return view('livewire.admin.list-client');
    }

}
