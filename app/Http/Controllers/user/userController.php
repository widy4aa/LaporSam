<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function Dashboard(){
        return view('user.dashboard');
    }
    public function history(){
        return view('user.history');
    }
    public function buang(){
        return view('user.buang');
    }
    public function listTps(){
        return view('user.listTps');
    }
    public function leaderboard(){
        return view('user.leaderboard');
    }
}
