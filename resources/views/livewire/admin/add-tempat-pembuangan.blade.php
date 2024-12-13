<div>
    <div class="container mx-auto p-6 bg-inherit">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Tempat Pembuangan</h1>

            <form action="#" wire:submit.prevent="save">
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Tempat</label>
                    <input type="text" name="nama" id="nama" value="" wire:model="dataTempat.nama"
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600"
                        required>
                    @error('dataTempat.nama') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>


                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" wire:model="dataTempat.deskripsi"
                        class="w-full px-4 py-2 resize-none border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600"
                        rows="4" required></textarea>
                    @error('dataTempat.deskripsi') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>


                <div class="mb-4">
                    <label for="daya_tampung" class="block text-gray-700 font-semibold mb-2">Daya Tampung (Kg)</label>
                    <input type="number" name="daya_tampung" id="daya_tampung" value="" wire:model="dataTempat.daya_tampung"
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600"
                        required>
                    @error('dataTempat.daya_tampung') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="flex w-full gap-4">
                    <div class="w-4/12">
                        <label for="jenis" class="block text-gray-600 mb-2 font-medium">Jenis</label>
                        <select
                            name="jenis"
                            id="jenis"
                            wire:model="dataTempat.jenis"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                            <option value="">Pilih Jenis</option>
                            <option value="TPA">TPA</option>
                            <option value="TPS">TPS</option>
                        </select>
                        @error('dataTempat.jenis') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>


                    <div class="w-4/12">
                        <label for="kecamatan" class="block text-gray-600 mb-2 font-medium">Kecamatan</label>
                        <select
                            name="kecamatan"
                            id="kecamatan"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            wire:model="dataTempat.id_kecamatan"
                        >
                        <option value="">Pilih kecamatan</option>
                        @foreach ($dataKecamatan as $kecamatan )
                            <option value="{{$kecamatan->id}}">{{$kecamatan->kecamatan}}</option>
                        @endforeach
                        </select>
                        @error('dataTempat.id_kecamatan') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>


                    <div class="w-4/12">
                        <label for="location" class="block text-gray-600 mb-2 font-medium">Location</label>
                        <input type="text" name="location" id="location" value=""
                        wire:model="dataTempat.location"
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600"
                        required>
                        @error('dataTempat.location') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="img" class="block pt-4 text-gray-700 font-semibold mb-2">Ganti Gambar</label>
                    <input type="file" id="gambar" class="form-control" wire:model="dataTempat.link_gambar">
                    @if (is_object($dataTempat['link_gambar']) && method_exists($dataTempat['link_gambar'], 'temporaryUrl'))
                    <img src="{{ $dataTempat['link_gambar']->temporaryUrl() }}" alt="Preview Gambar" class="img-fluid mt-2" width="200">
                    @endif
                    @error('dataTempat.link_gambar') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="flex space-x-4">
                    <button type="submit"
                        class="px-6 py-2 bg-sky-900 text-gray-100 rounded-lg hover:bg-sky-600 transition duration-200">
                        Simpan
                    </button>
                    <a href="/admin/TempatPembuangan"
                        class="px-6 py-2 bg-gray-900 text-gray-100 rounded-lg hover:bg-gray-600 transition duration-200">
                        Kembali
                    </a>
                </div>
            </form>


        </div>
    </div>
</div>
