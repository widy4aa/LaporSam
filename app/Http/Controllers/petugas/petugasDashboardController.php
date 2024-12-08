<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class petugasDashboardController extends Controller
{
    public function dashboard(){

        return view('test.petugas.dashboard');
    }
}
