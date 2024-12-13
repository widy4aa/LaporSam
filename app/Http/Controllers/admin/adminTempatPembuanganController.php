<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\kecamatan;
use App\Models\tempat_pembuangan;
use DB;
use Illuminate\Http\Request;

class adminTempatPembuanganController extends Controller
{
    //
    public function listTempatPembuangan(){

        return view('admin.listTempat');
    }

    public function DetailTempatPembuangan($id){
        return view('admin.DetailTempat',compact('id'));
    }

    public function addTempatPembuangan(){

        return view('admin.addTempat');
    }

}
