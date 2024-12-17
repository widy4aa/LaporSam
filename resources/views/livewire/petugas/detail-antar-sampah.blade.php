<div>
    @php

    @endphp
    <div class="container mx-auto p-6 bg-inherit">
        <div class="bg-white shadow-md rounded-lg p-4 flex justify-between items-center max-w-4xl mx-auto">
            <div class="w-2/3">
                @if (!$isEditing)
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">Detail Sampah</h1>
                    <div>
                        <p class="text-lg font-semibold text-gray-700">ID: <span class="text-gray-500">{{ $sampah['id'] }}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Nama Pembuang: <span class="text-gray-500">{{$sampah['nama_pembuang'] }}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Kecamatan: <span class="text-gray-500">{{ $sampah['kecamatan'] }}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Berat: <span class="text-gray-500">{{ $sampah['berat'] }}</span></p>
                    </div>
                    <div class="flex space-x-4 mt-6">
                        <a href="#"
                            wire:click="edit"
                            class="px-4 py-2 bg-green-700 text-gray-100 rounded-lg hover:bg-green-500 transition duration-200">
                            Setujui
                        </a>
                        <a type="submit"
                            wire:click="delete"
                            class="px-4 py-2 bg-red-900 text-gray-100 rounded-lg hover:bg-red-600 transition duration-200">
                            Hapus
                        </a>
                        <a
                            href="/petugas/jobdesk/"
                            class="px-4 py-2 bg-gray-900 text-gray-100 rounded-lg hover:bg-gray-600 transition duration-200">
                            Kembali
                        </a>
                    </div>
                    @else
                    <h2 class="text-2xl font-semibold mb-4">Apakah Berat Sampah Sudah Benar?</h2>
                    <form wire:submit.prevent="save">
                        <div class="mb-4">
                            <label for="berat" class="block text-sm font-medium text-gray-700 mb-2">Berat</label>
                            <input
                                type="number"
                                id="berat"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                wire:model="editableData.berat"
                            >
                        </div>
                        <div class="flex space-x-3">
                            <button
                                type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300"
                            >
                                Save
                            </button>
                            <button
                                type="button"
                                class="bg-gray-400 hover:bg-gray-500 text-white font-medium py-2 px-4 rounded-lg transition duration-300"
                                wire:click="cancel"
                            >
                                Cancel
                            </button>
                        </div>
                    </form>

                @endif
            </div>
        </div>
    </div>
</div>
