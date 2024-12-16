<div>
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
    <div class="container mx-auto p-6 bg-inherit">
        <div class="bg-white shadow-md rounded-lg p-4 flex justify-between items-center max-w-4xl mx-auto">
            <div class="w-full">
            @if (!$isEditing)
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">Detail Petugas</h1>
                    <div>
                        <p class="text-lg font-semibold text-gray-700">ID: <span class="text-gray-500">{{$petugas['id']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Nama: <span class="text-gray-500">{{$petugas['name']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Username: <span class="text-gray-500">{{$petugas['username']}}</p>
                        <p class="text-lg font-semibold text-gray-700">Kecamatan: <span class="text-gray-500">{{$petugas['kecamatan']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Alamat: <span class="text-gray-500">{{$petugas['alamat_lengkap']}}<span></p>
                        <p class="text-lg font-semibold text-gray-700">Point: <span class="text-gray-500">{{$petugas['point']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Lokasi TPS: <span class="text-gray-500">{{$petugas['tempat_pembuangan']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Role: <span class="text-gray-500">{{$petugas['role']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Status:
                            <span class="px-2 py-1 text-sm font-medium text-green-800 bg-green-200 rounded-lg">{{$petugas['status']}}</span>
                        </p>
                    </div>

                    <div class="flex space-x-4 mt-6">
                        <a wire:click="edit"
                            class="px-4 py-2 bg-sky-900 text-gray-100 rounded-lg hover:bg-sky-600 transition duration-200">
                            Edit
                        </a>
                        <a wire:click="delete"
                        class="px-4 py-2 bg-red-900 text-gray-100 rounded-lg hover:bg-red-600 transition duration-200">
                                Hapus
                        </a>
                        <a href="/admin/petugas"
                            class="px-4 py-2 bg-gray-900 text-gray-100 rounded-lg hover:bg-gray-600 transition duration-200">
                            Kembali
                        </a>
                    </div>
                </div>

                <div class="w-1/3 flex justify-center items-center">
                    <img src="/storage/{{$petugas['link_gambar']}}" alt="Profile Picture"
                        class="w-40 h-40 rounded-full object-cover">
                </div>
            @else
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Petugas</h1>
                 <form wire:submit.prevent="save" class="space-y-6">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username" wire:model="editableData.username"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" wire:model="editableData.password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="tempat_pembuangan" class="block text-sm font-medium text-gray-700">Tempat Pembuangan</label>
                        <select id="tempat_pembuangan" wire:model="editableData.id_tempat_pembuangan"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="{{ $editableData['tempat_pembuangan'] }}">{{ $editableData['tempat_pembuangan'] }}</option>
                            @foreach ($TempatPembuangan as $Tp)
                                <option value="{{ $Tp->id }}">{{ $Tp->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="role_petugas" class="block text-sm font-medium text-gray-700">Role Petugas</label>
                        <select id="role_petugas" wire:model="editableData.role"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="{{ $editableData['role'] }}">{{ $editableData['role'] }}</option>
                            <option value="lapangan">Lapangan</option>
                            <option value="penjaga">Penjaga</option>
                        </select>
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white font-medium rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Save
                        </button>
                        <button type="button" wire:click="cancel"
                            class="px-4 py-2 bg-gray-300 text-gray-700 font-medium rounded-md shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400">
                            Cancel
                        </button>
                    </div>
                </form>

            @endif

        </div>
    </div>
</div>
