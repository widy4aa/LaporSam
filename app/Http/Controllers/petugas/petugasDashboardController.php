<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class petugasDashboardController extends Controller
{
    public function dashboard(){

        echo 'aku berhasil login';
        dd(Auth::user());

    }
}
