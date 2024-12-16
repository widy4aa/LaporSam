<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class adminPetugasController extends Controller
{
    //
    public function listPetugas(){
        return view('admin.listPetugas');
    }

    public function addPetugas(){
        return view('admin.addPetugas');
    }

    public function petugas($id){
        return view('admin.petugas',compact('id'));
    }

}
