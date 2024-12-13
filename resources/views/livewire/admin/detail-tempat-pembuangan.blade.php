<div class="container mt-4">
    <!-- Flash Message -->
    @if (session()->has('message'))
    <div class="mx-6 bg-yellow-100 border-yellow-500 shadow-md rounded-lg p-6 ">
        <div class="alert alert-success text-xl ">
            {{ session('message') }}
        </div>
    </div>
    @endif

    @php
    @endphp
    <!-- Form Detail -->
    @if (!$isEditing)
    <div class="container mx-auto p-6 bg-inherit">
        <div class="bg-white shadow-md rounded-lg p-6 ">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Detail TPS</h1>
            <div class="mb-6">
                <div class="flex">
                    <div class="w-1/2">
                        <p class="text-lg font-semibold text-gray-700">ID: <span class="text-gray-500">{{$tps['id']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Nama Tempat: <span class="text-gray-500">{{$tps['nama']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Deskripsi: <span class="text-gray-500">{{$tps['deskripsi']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Kecamatan: <span class="text-gray-500">{{$tps['kecamatan']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Daya Tampung: <span class="text-gray-500">{{$tps['daya_tampung']}} Kg</span></p>
                        <p class="text-lg font-semibold text-gray-700">Jumlah Petugas: <span class="text-gray-500">{{$tps['jumlahpetugas']}}</span></p>
                    </div>
                    <!-- Gambar yang rata kanan -->
                    <div class="ml-auto">
                        <img src="{{ asset('storage/' . $editableData['link_gambar']) }}"
                        class="w-72 h-auto rounded-lg object-cover mt-2"
                        alt="Gambar Lama" class="img-fluid mt-2" width="200">
                        <br>
                        <a class="px-6 py-2 bg-green-600  text-gray-100 rounded-lg hover:bg-green-700 transition duration-200"
                        href="https://www.google.com/maps?q={{$tps['lat']}},{{$tps['longt']}}">Link Maps</a>
                    </div>
                </div>
            </div>
            <div class="flex space-x-4">
                <!-- Tombol Edit -->
                <a
                    wire:click="edit"
                    class="px-6 py-2 bg-sky-900 text-gray-100 rounded-lg hover:bg-sky-600 transition duration-200">
                    Edit
                </a>

                <button type="submit"
                    wire:click="delete"
                    class="px-6 py-2 bg-red-900 text-gray-100 rounded-lg hover:bg-red-600 transition duration-200">
                    Hapus
                </button>

                <!-- Tombol Kembali -->
                <a href="{{ url('/admin/TempatPembuangan') }}"
                    class="px-6 py-2 bg-gray-900 text-gray-100 rounded-lg hover:bg-gray-600 transition duration-200">
                    Kembali
                </a>
            </div>
        </div>
    </div>
    @else
    <!-- Editable Form -->
    <div class="container mx-auto p-6 bg-inherit">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit TPS</h1>
            <form  wire:submit.prevent="save">
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Tempat</label>
                    <input type="text" name="nama" id="nama" value=""
                        wire:model="editableData.nama"
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600"
                        required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi"
                        wire:model="editableData.deskripsi"
                        class="w-full px-4 py-2 resize-none border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600"
                        rows="4" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="daya_tampung" class="block text-gray-700 font-semibold mb-2">Daya Tampung (Kg)</label>
                    <input type="number" name="daya_tampung" id="daya_tampung" value=""
                        wire:model="editableData.daya_tampung"
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2" for="gambar" class="form-label">Gambar</label>
                    <input type="file" id="gambar" class="form-control" wire:model="editableData.link_gambar">
                    @if (is_object($editableData['link_gambar']) && method_exists($editableData['link_gambar'], 'temporaryUrl'))
                        <!-- Preview gambar baru -->
                        <img src="{{ $editableData['link_gambar']->temporaryUrl() }}"  class="w-72 h-auto rounded-lg object-cover mt-2" alt="Preview Gambar" class="img-fluid mt-2" width="200">
                    @elseif($editableData['link_gambar'])
                        <!-- Preview gambar lama -->
                        <img src="{{ asset('storage/' . $editableData['link_gambar']) }}"  class="w-72 h-auto rounded-lg object-cover mt-2" alt="Gambar Lama" class="img-fluid mt-2" width="200">
                    @endif
                </div>

                <div class="flex space-x-4">
                    <button type="submit"
                        class="px-6 py-2 bg-sky-900 text-gray-100 rounded-lg hover:bg-sky-600 transition duration-200">
                        Simpan
                    </button>
                    <a href="/tp"
                        class="px-6 py-2 bg-gray-900 text-gray-100 rounded-lg hover:bg-gray-600 transition duration-200">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
