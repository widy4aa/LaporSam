<div>
    <div class="flex justify-start px-24 py-2 w-full">
        <img
            src="https://img.icons8.com/ios/100/left--v1.png"
            alt="Back Button"
            class="w-14 h-14 cursor-pointer"
            onclick="window.history.back();"
            >
    </div>
    <div class="container mx-auto mt-10 px-4">

        <h1 class="text-2xl font-bold mb-4 text-gray-800">Data Sampah</h1>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left border">No</th>
                        <th class="py-3 px-6 text-left border">Nama Pembuang</th>
                        <th class="py-3 px-6 text-left border">Petugas</th>
                        <th class="py-3 px-6 text-left border">Tempat Pembuangan</th>
                        <th class="py-3 px-6 text-left border">Berat (kg)</th>
                        <th class="py-3 px-6 text-left border">metode</th>
                        <th class="py-3 px-6 text-left border">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @php
                        $No = 1 ;
                    @endphp
                    @foreach ($history_sampah as $history )
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-6 border">{{$No ++}}</td>
                        <td class="py-3 px-6 border">{{$history->nama_pengguna}}</td>
                        <td class="py-3 px-6 border">{{$history->nama_petugas}}</td>
                        <td class="py-3 px-6 border">{{$history->tempat_pembuangan}}</td>
                        <td class="py-3 px-6 border">{{$history->berat}}</td>
                        <td class="py-3 px-6 border">{{$history->metode}}</td>
                        <td class="py-3 px-6 border">{{$history->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
