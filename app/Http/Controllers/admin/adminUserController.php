<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class adminUserController extends Controller
{
    public function listClient(){

        return view('admin.listClient');
    }

    public function client($id){
        return view('admin.client',compact('id'));
    }

    public function addClient(){

        return view('admin.addClient');
    }


}
