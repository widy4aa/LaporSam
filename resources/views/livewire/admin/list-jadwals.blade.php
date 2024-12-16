<div>
    @if (session()->has('success'))
    <div class="mx-48 mt-6 bg-green-100 border-green-500 shadow-md rounded-lg p-6 ">
        <div class="alert alert-success text-xl ">
            {{ session('success') }}
        </div>
    </div>
    @endif
    <div class="container mx-auto p-6 bg-inherit">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Jadwal Pengambilan</h1>
        </div>

        <div class="mb-6 bg-white shadow-md rounded-lg p-4">
            <form action="#" wire:submit.prevent="save">
                <div class="flex space-x-4">
                    <div class="flex flex-col w-1/2">
                        <label for="start_time" class="text-lg font-medium text-gray-700 mb-2">Waktu Mulai</label>
                        <input type="time" id="start_time" name="start_time" required wire:model="jadwalAdd.waktu_mulai"
                            class="px-4 py-2 border border-gray-300 rounded-md">
                        @error('jadwalAdd.waktu_mulai')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col w-1/2">
                        <label for="end_time" class="text-lg font-medium text-gray-700 mb-2">Waktu Selesai</label>
                        <input type="time" id="end_time" name="end_time" required wire:model="jadwalAdd.waktu_berakhir"
                            class="px-4 py-2 border border-gray-300 rounded-md">
                        @error('jadwalAdd.waktu_berakhir')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="mt-4 px-6 py-2 bg-sky-900 text-gray-100 rounded-lg hover:bg-sky-600 transition duration-200">
                    Tambah Jadwal
                </button>
            </form>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Waktu Mulai</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Waktu Selesai</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $No = 1 ;
                    @endphp
                    @foreach ($jadwal as $j )
                    <tr>
                        <td class="px-4 py-2 border-b">{{$No ++}}</td>
                        <td class="px-4 py-2 border-b">{{$j->waktu_mulai}}</td>
                        <td class="px-4 py-2 border-b">{{$j->waktu_berakhir}}</td>
                        <td class="px-4 py-2 border-b">
                        <button type="submit"
                                
                                class="px-4 py-2 bg-red-900 text-gray-100 rounded-lg hover:bg-red-600 transition duration-200">
                                Hapus
                        </button>
                        </td>
                     </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
