<div>
    {{-- The Master doesn't talk, he acts. --}}
    @if (session()->has('success'))
    <div class="mx-48 mt-6 bg-green-100 border-green-500 shadow-md rounded-lg p-6 ">
        <div class="alert alert-success text-xl ">
            {{ session('success') }}
        </div>
    </div>
    @endif
    @if (session()->has('error'))
    <div class="mx-48 mt-6 bg-red-100 border-red-500 shadow-md rounded-lg p-6 ">
        <div class="alert alert-success text-xl ">
            {{ session('error') }}
        </div>
    </div>
    @endif
    <div class="bg-inherit">
        <div class="bg-white rounded-lg shadow-lg w-100 p-6 m-4 flex flex-col pl-10">
            <h4 class="text-left text-4xl font-semibold mb-2">Sampah Antar Yang Perlu di Konfirmasi</h4>
            <div class="overflow-x-auto">
                <table class="min-w-full mt-12 table-auto border-collapse border border-gray-300 text-gray-800">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Nama</th>
                            <th class="border border-gray-300 px-4 py-2">Berat</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($sampahs as $sampah)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $no++ }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $sampah->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $sampah->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $sampah->berat }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $sampah->status }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="flex justify-center">
                                    <a href="/petugas/sampah/antar/{{ $sampah->id }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded text-sm">
                                        Ambil
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
