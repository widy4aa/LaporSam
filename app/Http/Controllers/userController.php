<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class userController extends Controller
{
    //
    public function index(){

        $users = DB::table('users')
        ->select('users.id', 'name', 'username', 'link_gambar', 'role', 'location', 'alamat_lengkap','point',
                 DB::raw('ST_X(location) AS lat'),
                 DB::raw('ST_Y(location) AS longt'),
                'kecamatans.kecamatan'
                 )
        ->join('kecamatans', 'users.id_kecamatan', '=', 'kecamatans.id')
        ->orderBy('users.id')
        ->paginate(5);


    return view('usertest.Profile', compact('users'));
    }

    public function registerProfile(){
        return view('usertest.registerProfile');
    }


    public function userDetail($id){
             $user = DB::table('users')
             ->select('users.id', 'name', 'username', 'link_gambar', 'role', 'location', 'alamat_lengkap','point',
                      DB::raw('ST_X(location) AS lat'),
                      DB::raw('ST_Y(location) AS longt'),
                     'kecamatans.kecamatan'
                      )
             ->join('kecamatans', 'users.id_kecamatan', '=', 'kecamatans.id')
             ->where('users.id','=',$id)
             ->first()
             ;
             if (!$user) {
                 abort(404, 'User not found');
             }
             //dd($user);
             return view('usertest.DetailProfile', compact('user'));
    }

    public function registerUser(Request $request){
        $user = $request->all();

        // Cek apakah username sudah ada di database
        $existingUser = DB::table('users')->where('username', $user['username'])->first();

        if ($existingUser) {
            // Jika username sudah ada, kembalikan response error
            return response()->json(['error' => 'Username already exists.'], 400);
        }

        // Set data default
        $user['point'] = 0;
        $user['role'] = 'user';
        $user['password'] = Hash::make($user['password']);

        // Menangani lokasi jika ada
        if (isset($user['location'])) {
            $user['location'] = explode(', ', $user['location']);
        }

        // Mendapatkan id_kecamatan dari tabel kecamatans
        $id_kecamatan = DB::table('kecamatans')->select('id')->where('kecamatan', '=', $user['kecamatan'])->first();
        $user['id_kecamatan'] = $id_kecamatan->id;

        unset($user['kecamatan']); // Menghapus data kecamatan dari array user

        // Simpan data user tanpa gambar terlebih dahulu
        $userId = DB::table('users')->insertGetId([
            'name' => $user['name'],
            'username' => $user['username'],
            'alamat_lengkap' => $user['alamat_lengkap'],
            'link_gambar' => 'dump.png',  // Sementara kosong
            'role' => $user['role'],
            'point' => $user['point'],
            'password' => $user['password'],
            'id_kecamatan' => $user['id_kecamatan'],
            'created_at' => now(),
            'updated_at' => now(),
            'location' => DB::raw("ST_GeomFromText('POINT(" . $user['location'][1] . " " . $user['location'][0] . ")')")
        ]);

        // Menyimpan gambar dengan nama username
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = $user['username'] . '.png';  // Nama file berdasarkan username
            $imagePath = $image->storeAs('img', $filename);

            // Update kolom 'link_gambar' dengan path gambar yang baru
            DB::table('users')->where('id', $userId)->update(['link_gambar' => $imagePath]);
        }

        // Mengembalikan respons sukses
        return response()->json(['message' => 'User registered successfully.'], 200);

    }
}
