@extends('admin.layouts.admin')

@section('content')
    <div class="bg-inherit">
        <div class="bg-white rounded-lg shadow-lg w-100 p-6 m-4 flex flex-col pl-10">
            <h2 class="text-left text-4xl font-semibold mb-2">Selamat Datang , {{$dataProfile->name}}</h2>
        </div>

        <div class="flex w-full gap-4">
            <div class="bg-white rounded-lg shadow-lg w-1/3 h-56 p-6 ml-4">
                <h2 class="text-left text-2xl font-semibold mb-2">Jumlah Client</h2>
                <div class="flex">
                    <img src="/icon/user-girl.png" class="w-32 h-32" alt="">
                    <p class="text-left text-gray-500 text-8xl ml-4">{{$jumlahUser}}</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg w-1/3 h-56 p-6 ">
                <h2 class="text-left text-2xl font-semibold mb-2">Jumlah Petugas</h2>
                <div class="flex">
                    <img src="/icon/petugas.png" alt="" class="w-32 h-32">
                    <p class="text-left text-gray-500 text-8xl ml-4">{{$jumlahPetugas}}</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg w-1/3 h-56 p-6 mr-4 ">
                <h2 class="text-left text-2xl font-semibold mb-2">Jumlah Tempat Pembuangan Tps/Tpa</h2>
                <div class="flex">
                    <img src="/icon/trash-bags.jpg" class="h-32 rounded-lg " alt="">
                    <p class="text-left text-gray-500 text-8xl ml-4">{{$jumlahPetugas}}</p>
                </div>
            </div>
        </div>

        <div class="flex w-full gap-4">
            <div class="bg-white rounded-lg shadow-lg w-3/5 p-6 ml-4 mt-3 mb-5">
                <h2 class="text-center text-2xl font-semibold mb-2">History Pembuangan Sampah</h2>
                <div class="container mx-auto p-4">
                    <div class="overflow-x-auto">
                      <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                          <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left">Pengguna</th>
                            <th class="py-3 px-6 text-left">Petugas</th>
                            <th class="py-3 px-6 text-left">Tempat Pembuangan</th>
                            <th class="py-3 px-6 text-left">Berat Sampah</th>
                            <th class="py-3 px-6 text-left">Waktu</th>
                          </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @php
                                $No = 1;
                            @endphp
                            @foreach ($historyBuang as $h )
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{$No ++;}}</td>
                                <td class="py-3 px-6 text-left">{{$h->User->name}}</td>
                                <td class="py-3 px-6 text-left">{{$h->petugas->user->name}}</td>
                                <td class="py-3 px-6 text-left">{{$h->petugas->tempat_pembuangan->nama}}</td>
                                <td class="py-3 px-6 text-left">{{$h->berat}}</td>
                                <td class="py-3 px-6 text-left">{{$h->created_at}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                      </table>
                    </div>
               </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg w-2/5 h-56 p-6 ml-4 mt-3 mb-5">
                <h2 class="text-center text-2xl font-semibold mb-2">Kecamatan Dengan Jumlah User Paling Banyak</h2>
                <div class="flex">
                    <img src="/icon/kecamatan.png" class="h-32 rounded-lg " alt="">
                    <p class="text-left text-gray-500 font-medium text-8xl ml-4">{{$namaKecamatanTerbanyak->kecamatan}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
