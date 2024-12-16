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
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">Profile</h1>
                    <div>
                        <p class="text-lg font-semibold text-gray-700">ID: <span class="text-gray-500">{{$client['id']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Nama: <span class="text-gray-500">{{$client['name']}}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Username: <span class="text-gray-500">{{$client['username']}}</p>
                    </div>

                    <div class="flex space-x-4 mt-6">
                        <a wire:click="edit"
                            class="px-4 py-2 bg-sky-900 text-gray-100 rounded-lg hover:bg-sky-600 transition duration-200">
                            Edit
                        </a>
                        <a href="/admin/client"
                            class="px-4 py-2 bg-gray-900 text-gray-100 rounded-lg hover:bg-gray-600 transition duration-200">
                            Kembali
                        </a>
                    </div>
                </div>

                <div class="w-1/3 flex justify-center items-center">
                    <img src="{{ asset('storage/' . $editableData['link_gambar']) }}" alt="Profile Picture"
                        class="w-40 h-40 rounded-full object-cover">
                </div>
            @else
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Client</h1>
                 <form wire:submit.prevent="save" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">name</label>
                        <input type="text" id="name" wire:model="editableData.name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
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
