<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class adminUserController extends Controller
{
    public function listPetugas(){
        $users = User::with('kecamatan')
        ->where('role','=','user')
        ->paginate(10);

      // dd($petugas);

        return view('test.admin.listDataUser',compact('users'));
    }
    public function deleteUser($id){
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect()->route('admin.listUser');
    }


}
