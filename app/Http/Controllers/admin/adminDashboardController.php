<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\kecamatan;
use App\Models\sampah;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    //
    public function dashboard (){

        $dataProfile = Auth::user();
        $jumlahUser= User::where('role', 'user')->count();
        $jumlahPetugas= User::where('role', 'petugas')->count();
        $totalBerat = sampah::whereDate('created_at', Carbon::today())
        ->sum('berat');

        $kecamatanTerbanyak = User::select('id_kecamatan', DB::raw('COUNT(*) as jumlah_user'))
        ->groupBy('id_kecamatan')
        ->orderByDesc('jumlah_user')
        ->with('kecamatan')
        ->first();

        $namaKecamatanTerbanyak = kecamatan::find($kecamatanTerbanyak->id_kecamatan);



        return view('test.admin.dashboard',
        compact('jumlahUser',
        'jumlahPetugas',
                    'totalBerat',
                    'dataProfile',
                    'namaKecamatanTerbanyak'
    ));

    }

}

