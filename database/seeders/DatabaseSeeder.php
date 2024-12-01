<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('kecamatans')->insert([
            ['kecamatan'=>'wuluhan'],
            ['kecamatan'=>'Sumbersari']
        ]);

        DB::table('users')->insert([
            ['name' => 'Widya',
            'username' => 'Widy4aa',
            'password' => bcrypt('dionugraha34'),
            'link_gambar'=>'.png',
            'role'=>'admin',
            'point'=>0,
            'location'=> DB::raw("ST_GeomFromText('POINT(-8.164181041570442 113.71071912272032)')"),
            'alamat_lengkap'=>'Dsn. Pomo Ds.Ampel',
            'id_kecamatan'=>1
            ],
            ['name' => 'Lia',
            'username' => 'Li4aa',
            'password' => bcrypt('dionugraha34'),
            'link_gambar'=>'.png',
            'role'=>'user',
            'point'=>0,
            'location'=> DB::raw("ST_GeomFromText('POINT(-8.164181041570442 113.71071912272032)')"),
            'alamat_lengkap'=>'Dsn. Pomo Ds.Ampel',
            'id_kecamatan'=>1
             ],
            ['name' => 'Caesar',
            'username' => 'Caes4r',
            'password' => bcrypt('dionugraha34'),
            'link_gambar'=>'.png',
            'role'=>'petugas',
            'point'=>0,
            'location'=> DB::raw("ST_GeomFromText('POINT(-8.165466071757828 113.7101397655829)')"),
            'alamat_lengkap'=>'Dsn. Pomo Ds.Ampel',
            'id_kecamatan'=>1
            ],
            ['name' => 'Caesar2',
            'username' => 'Caes4r2',
            'password' => bcrypt('dionugraha34'),
            'link_gambar'=>'.png',
            'role'=>'petugas',
            'point'=>0,
            'location'=> DB::raw("ST_GeomFromText('POINT(-8.165466071757828 113.7101397655829)')"),
            'alamat_lengkap'=>'Dsn. Pomo Ds.Ampel',
            'id_kecamatan'=>2
            ]
        ]);

        DB::table('tempat_pembuangans')->insert([
            ['nama'=>'Abdul Syukur trash',
             'deskripsi'=>'Lorem ipsum dolar sit amet',
             'daya_tampung'=>25000,
             'jenis'=>'TPS',
             'link_gambar'=>'.png',
             'id_kecamatan'=>1,
             'location'=> DB::raw("ST_GeomFromText('POINT(-8.16850000070743 113.71196344063596)')")
            ],
            ['nama'=>'Abdul Syukur Mega trash',
            'deskripsi'=>'Lorem ipsum dolar sit amet',
            'daya_tampung'=>2500000,
            'jenis'=>'TPA',
            'link_gambar'=>'.png',
            'id_kecamatan'=>1,
            'location'=> DB::raw("ST_GeomFromText('POINT(-8.162420536873308 113.72379662466008)')")
            ]
        ]);

        DB::table('jadwals')->insert([
            ['waktu_mulai'=>'08:28:25',
            'waktu_berakhir'=>'09:28:25'
            ],
            ['waktu_mulai'=>'03:28:25',
            'waktu_berakhir'=>'05:28:25'
            ]
        ]);

        DB::table('petugas')->insert([
            [
                'id_user'=>3,
                'id_tempat_pembuangan'=>1,
                'status'=>'siaga',
                'role'=>'lapangan'
            ],
            [
                'id_user'=>4,
                'id_tempat_pembuangan'=>2,
                'status'=>'siaga',
                'role'=>'lapangan'
            ]
        ]);

        DB::table('jadwal_petugas')->insert([
            [
                'id_petugas'=>1,
                'id_jadwal'=>1
            ],
            [
                'id_petugas'=>2,
                'id_jadwal'=>2
            ]
        ]);


        DB::table('sampahs')->insert([
            [
                'id_pengguna'=>2,
                'id_petugas'=>1,
                'id_tempat_pembuangan'=>1,
                'id_jadwal'=>1,
                'metode'=>'ambil',
                'status'=>'selesai',
                'berat'=>'20'
            ],
            [
                'id_pengguna'=>2,
                'id_petugas'=>2,
                'id_tempat_pembuangan'=>2,
                'id_jadwal'=>2,
                'metode'=>'ambil',
                'status'=>'selesai',
                'berat'=>'30'
            ]
        ]);
    }
}
