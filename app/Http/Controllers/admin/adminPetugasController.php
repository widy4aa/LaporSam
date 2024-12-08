<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class adminPetugasController extends Controller
{
    //
    public function listPetugas(){
        $users = User::with('kecamatan')
        ->with('petugas')
        ->where('role','=','petugas')
        ->paginate(10);

      // dd($petugas);

        return view('test.admin.listDataPetugas',compact('users'));
    }

    public function deletePetugas($id){
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect()->route('admin.listPetugas');
    }
}
