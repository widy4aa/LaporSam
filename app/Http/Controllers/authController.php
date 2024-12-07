<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class authController extends Controller
{
    //

    public function login(){



        if (Auth::user()) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'petugas') {
                return redirect()->route('petugas.dashboard');
            } elseif ($user->role === 'user') {
                return redirect()->route('user.dashboard');
            }
        }

        return view('test.login');
    }

    public function loginProses(Request $request){
    // Validasi input


    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($request->only('username', 'password'))) {

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->route('user.dashboard');
        }

    }

    // Jika gagal login
    return back()->withErrors([
        'error' => 'Username atau password salah.',
    ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
