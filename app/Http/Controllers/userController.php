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
        $kecamatans = DB::table('kecamatans')->select('kecamatan')->get();
        return view('usertest.registerProfile',compact('kecamatans'));
    }


    public function userDetail($username){
             $user = DB::table('users')
             ->select('users.id', 'name', 'username', 'link_gambar', 'role', 'location', 'alamat_lengkap','point',
                      DB::raw(value: 'ST_X(location) AS lat'),
                      DB::raw('ST_Y(location) AS longt'),
                     'kecamatans.kecamatan'
                      )
             ->join('kecamatans', 'users.id_kecamatan', '=', 'kecamatans.id')
             ->where('users.username','=',$username)
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

        $existingUser = DB::table('users')->where('username', $user['username'])->first();

        if ($existingUser) {
            return response()->json(['error' => 'Username already exists.'], 400);
        }

        $user['point'] = 0;
        $user['role'] = 'user';
        $user['password'] = Hash::make($user['password']);

        if (isset($user['location'])) {
            $user['location'] = explode(', ', $user['location']);
        }

        $id_kecamatan = DB::table('kecamatans')->select('id')->where('kecamatan', '=', $user['kecamatan'])->first();
        $user['id_kecamatan'] = $id_kecamatan->id;

        unset($user['kecamatan']);

        $userId = DB::table('users')->insertGetId([
            'name' => $user['name'],
            'username' => $user['username'],
            'alamat_lengkap' => $user['alamat_lengkap'],
            'link_gambar' => 'dump.png',
            'role' => $user['role'],
            'point' => $user['point'],
            'password' => $user['password'],
            'id_kecamatan' => $user['id_kecamatan'],
            'created_at' => now(),
            'updated_at' => now(),
            'location' => DB::raw("ST_GeomFromText('POINT(" . $user['location'][1] . " " . $user['location'][0] . ")')")
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = $user['username'] . '.png';  // Nama file berdasarkan username
            $imagePath = $image->storeAs('img', $filename);

            DB::table('users')->where('id', $userId)->update(['link_gambar' => $imagePath]);
        }

        return response()->json(['message' => 'User registered successfully.'], 200);

    }

    public function deleteUser ($username){

        $user = User::find($username);
        if (!$user) {
            return response()->json([
                'message' => 'Data tidak ditemukan.'
            ], 404);
        };

        $user->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus.'
        ], 200);
    }

    public function updateUser(Request $request,$username){
        dd($username);


    }


}
