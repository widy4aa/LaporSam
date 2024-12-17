<div>
    @php
//        dd($sampah)
    @endphp
    <div class="container mx-auto p-6 bg-inherit">
        <div class="bg-white shadow-md rounded-lg p-4 flex justify-between items-start max-w-4xl mx-auto">
            <div class="w-2/3 pr-4">
                @if (!$isEditing)
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">Detail Sampah</h1>
                    <div>
                        <p class="text-lg font-semibold text-gray-700">ID: <span class="text-gray-500">{{ $sampah['id'] }}</span></p>
                        <p class="text-lg font-semibold text-gray-700">Nama Pembuang: <span class="text-gray-500">{{ $sampah['nama_pembuang'] }}</span></p>
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
                        <a href="/petugas/jobdesk/"
                            class="px-4 py-2 bg-gray-900 text-gray-100 rounded-lg hover:bg-gray-600 transition duration-200">
                            Kembali
                        </a>
                        <a  href="https://www.google.com/maps?q={{$sampah['lat']}},{{$sampah['longt']}}"
                            class="px-4 py-2 bg-blue-900 text-gray-100 rounded-lg hover:bg-blue-600 transition duration-200">
                            Link Maps
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
                                class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                                Save
                            </button>
                            <button
                                type="button"
                                class="bg-gray-400 hover:bg-gray-500 text-white font-medium py-2 px-4 rounded-lg transition duration-300"
                                wire:click="cancel">
                                Cancel
                            </button>
                        </div>
                    </form>
                @endif
            </div>
            <div class="w-1/3 flex justify-center items-center">
                {{-- <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9282728147655!2d{{ $sampah['longt'] }}!3d{{ $sampah['lat'] }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14e6bf8a299%3A0x4a226b4026b41a3!2sJakarta%20Utara!5e0!3m2!1sen!2sid!4v1699999999999"
                    width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    class="rounded-lg shadow-md">
                </iframe> --}}
            </div>
        </div>
    </div>
</div>
