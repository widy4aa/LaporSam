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

    public function DetailTempatPembuangan(){

        return view('admin.DetailTempat');
    }

    public function addTempatPembuangan(){

        return view('admin.addTempat');
    }

    // public function formaddTempatPembuangan(){
    //     $kecamatans = kecamatan::all();
    //     return view('test.admin.addTempatPembuangan',compact('kecamatans'));
    // }
    // public function addTempatPembuanganProses(Request $request){

    //     if (isset($request->link_gambar) && is_object($request->link_gambar)) {
    //         $path = $request->link_gambar->store('images/tps');
    //     }

    //     $coordinates = explode(',', $request->location);
    //     $latitude = trim($coordinates[0]);
    //     $longitude = trim($coordinates[1]);

    //     tempat_pembuangan :: create([
    //         'nama' => $request->nama,
    //         'deskripsi' => $request->deskripsi,
    //         'daya_tampung' => $request->daya_tampung,
    //         'jenis' => $request->jenis,
    //         'link_gambar' => $path,
    //         'id_kecamatan' => $request->id_kecamatan,
    //         'location' => DB::raw("ST_GeomFromText('POINT($longitude $latitude)')"),

    //     ]);
    // }

}
