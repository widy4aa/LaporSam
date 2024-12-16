<div>
    <div class="container mx-auto p-6 bg-inherit">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Form Tambah Petugas</h1>
                <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="name" wire:model="forUser.name" class="w-full p-2 border rounded-md @error('forUser.name') border-red-500 @enderror">
                        @error('forUser.name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username" wire:model="forUser.username" class="w-full p-2 border rounded-md @error('forUser.username') border-red-500 @enderror">
                        @error('forUser.username')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                        <select id="kecamatan" wire:model="forUser.id_kecamatan" class="w-full p-2 border rounded-md @error('forUser.id_kecamatan') border-red-500 @enderror">
                            <option value="">-- Pilih Kecamatan --</option>
                            @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                            @endforeach
                        </select>
                        @error('forUser.id_kecamatan')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <textarea id="alamat_lengkap" wire:model="forUser.alamat_lengkap" class="w-full p-2 border rounded-md @error('forUser.alamat_lengkap') border-red-500 @enderror"></textarea>
                        @error('forUser.alamat_lengkap')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" wire:model="forUser.password" class="w-full p-2 border rounded-md @error('forUser.password') border-red-500 @enderror">
                        @error('forUser.password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Tempat Pembuangan -->
                    <div>
                        <label for="id_tempat_pembuangan" class="block text-sm font-medium text-gray-700">Tempat Pembuangan</label>
                        <select id="id_tempat_pembuangan" wire:model="forPetugas.id_tempat_pembuangan" class="w-full p-2 border rounded-md @error('forPetugas.id_tempat_pembuangan') border-red-500 @enderror">
                            <option value="">-- Pilih Tempat Pembuangan --</option>
                            @foreach($tempatPembuangans as $tempat)
                                <option value="{{ $tempat->id }}">{{ $tempat->nama }}</option>
                            @endforeach
                        </select>
                        @error('forPetugas.id_tempat_pembuangan')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="flex space-x-4">
                            <div class="flex items-center">
                                <input type="radio" id="status_rest" value="rest" wire:model="forPetugas.status" class="text-blue-600 focus:ring-blue-500 @error('forPetugas.status') border-red-500 @enderror">
                                <label for="status_rest" class="ml-2 text-sm text-gray-700">Rest</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="status_siaga" value="siaga" wire:model="forPetugas.status" class="text-blue-600 focus:ring-blue-500 @error('forPetugas.status') border-red-500 @enderror">
                                <label for="status_siaga" class="ml-2 text-sm text-gray-700">Siaga</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="status_cuti" value="cuti" wire:model="forPetugas.status" class="text-blue-600 focus:ring-blue-500 @error('forPetugas.status') border-red-500 @enderror">
                                <label for="status_cuti" class="ml-2 text-sm text-gray-700">Cuti</label>
                            </div>
                        </div>
                        @error('forPetugas.status')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role Petugas -->
                    <div>
                        <label for="role_petugas" class="block text-sm font-medium text-gray-700">Role Petugas</label>
                        <select id="role_petugas" wire:model="forPetugas.role" class="w-full p-2 border rounded-md @error('forPetugas.role') border-red-500 @enderror">
                            <option value="">-- Pilih Role Petugas --</option>
                            <option value="lapangan">Lapangan</option>
                            <option value="penjaga">Penjaga</option>
                        </select>
                        @error('forPetugas.role')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-2">
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600">Simpan</button>
                        <button type="button" wire:click="back" class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600">Back</button>
                    </div>
                </form>

        </div>
    </div>


</div>
