<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class buangController extends Controller
{
    //
    public function form(){

        return view('test.users.formbuang');
    }
}
