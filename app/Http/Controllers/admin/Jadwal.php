<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Jadwal extends Controller
{
    //
    public function listJadwal(){
        return view('admin.listJadwals');
    }

}
