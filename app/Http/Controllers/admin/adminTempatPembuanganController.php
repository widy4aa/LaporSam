<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tempat_pembuangan;
use Illuminate\Http\Request;

class adminTempatPembuanganController extends Controller
{
    //
    public function listTempatPembuangan(){

        $tempat_pembuangans = tempat_pembuangan::with('kecamatan')->get();

        return view('test.admin.listTempatPembuangan',compact('tempat_pembuangans'));
    }


    public function formaddTempatPembuangan(){
        dd('aku di form');
    }
}
