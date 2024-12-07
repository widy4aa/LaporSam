<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class MultiStepFormController extends Controller
{
    //
    public function index(Request $request )
    {
        $step = $request->session()->get('step', 1); // Default ke step 1
        return view('test.users.formbuang', compact('step'));
    }

    public function next(Request $request)
    {

        $step = $request->input('step', 1);

        if ($request->has('back')) {
            // Kembali ke step sebelumnya
            $request->session()->put('step', max(1, $step - 1));
        } else {
            $data = $request->except('_token', 'step', 'back', 'next');
            $sessionData = $request->session()->get('data', []);
            $request->session()->put('data', array_merge($sessionData, $data));

            // Logika untuk Step 2 (pilih petugas/tempat)
            if ($step == 2) {
                $option = $request->input('option'); // Ambil pilihan petugas/tempat
                $request->session()->put('option', $option);

                if ($option === 'tempat') {
                    // Langsung lompat ke Step 4
                    $request->session()->put('step', 4);
                } else {
                    // Tetap di Step 3 untuk Data Petugas
                    $request->session()->put('step', 3);
                }
            } else {
                // Lanjutkan ke langkah berikutnya secara normal
                $request->session()->put('step', $step + 1);
            }
        }

        return redirect()->route('formbuang.index',['username' =>  Session::get('username', 'Guest')]);
    }

}
