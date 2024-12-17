<div>
    <div class="container mx-auto p-6 bg-inherit">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Form Tambah Petugas</h1>
            @if ($step === 1)
                     <div>
                        <label for="Berat" class="block text-sm font-medium text-gray-700">Berat</label>
                        <input type="number" id="berat" wire:model="formData.berat" min="1"
                        class="w-full p-2 border rounded-md @error('formData.berat"') border-red-500 @enderror">
                        @error('formData.berat')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="metode" class="block text-sm font-medium text-gray-700">Role Petugas</label>
                            <select id="metode" wire:model="formData.metode" class="w-full p-2 border rounded-md @error('forPetugas.role') border-red-500 @enderror">
                                <option value="">-- Pilih Opsi --</option>
                                <option value="antar">Antar</option>
                                <option value="ambil">Ambil</option>
                            </select>
                        @error('formData.metode')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Buttons -->
                    <br>
                    <div class="flex space-x-2">
                        <button type="button" wire:click="nextStep" class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600">Simpan</button>
                        <a href="/user/dashboard"  class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600">Back</a>
                    </div>
            @elseif ($step === 2)
                @if ($formData['metode'] == 'antar')
                <h1 class="text-xl font-semibold text-gray-500 mb-6" >Pilih Tempat Pembuangan</h1>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($tempat_pembuangans as $t )
                        <a
                            wire:click="pilihTempat({{$t->id}})"
                            class="block bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200 border-green-400">
                            <img src="/storage/{{$t->link_gambar}}" alt="TPS 1" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h2 class="text-lg font-semibold text-gray-800">{{$t->nama}}</h2>
                            </div>
                        </a>
                        @endforeach
                    </div>

                @elseif ($formData['metode'] == 'ambil')
                <h1 class="text-2xl font-semibold mb-4">Pilih Petugas Ambil</h1>

                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">No</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nama</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Kecamatan</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Tempat Pembuangan</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $No = 1 ;
                            @endphp

                            @foreach ($dataPetugasAmbil as $petugas )
                            <tr class="border-t border-gray-200">
                                <td class="px-4 py-2 text-sm text-gray-700">{{$No ++;}}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{$petugas->name}}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{$petugas->kecamatan->kecamatan}}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{$petugas->petugas[0]->tempat_pembuangan->nama}}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        wire:click="pilihPetugas({{$petugas->petugas[0]->id}})"
                                    >
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            @endif
        </div>
    </div>
</div>
