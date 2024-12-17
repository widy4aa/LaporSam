<div>
    <div class="bg-inherit">
        <div class="bg-white rounded-lg shadow-lg w-100 p-6 m-4 flex flex-col pl-10">
            <h2 class="text-left text-4xl font-semibold mb-2">Selamat Datang, {{$profile['nama']}}</h2>
        </div>

        <div class="flex w-full gap-4">
            <div class="bg-white rounded-lg shadow-lg w-3/5 p-6 ml-4 mt-3 mb-5">
                <h2 class="text-center text-2xl font-semibold mb-2">
                    @php

                    @endphp
                    @if ($profile['role']=='lapangan')
                        Sampah Ambil
                    @elseif($profile['role']=='penjaga')
                        Sampah Antar
                    @endif

                </h2>
                <div class="container mx-auto p-4">
                    <div class="overflow-x-auto">
                      <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                          <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left">Nama Pembuang</th>
                            <th class="py-3 px-6 text-left">Berat</th>
                            <th class="py-3 px-6 text-left">Dibuat Jam</th>
                            <th class="py-3 px-6 text-left">status</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">

                            @php
                                $No = 1;
                                // /dd($profile)
                            @endphp
                            @foreach ($profile['sampahs'] as $sampah )
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{$No++}}</td>
                                <td class="py-3 px-6 text-left">{{$sampah->User->name}}</td>
                                <td class="py-3 px-6 text-left">{{$sampah->berat}}</td>
                                <td class="py-3 px-6 text-left">{{$sampah->created_at->format('H:i')}}</td>
                                <td class="py-3 px-6 text-left">{{$sampah->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
               </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg w-2/5 h-80 p-6 ml-4 mt-3 mb-5">
                <h2 class="text-center text-2xl font-semibold mb-2">Status</h2>
                @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
                <form wire:submit.prevent="saveStatus" class="w-full max-w-sm mx-auto">
                    <div class="mb-4">
                        <label for="status" class="block text-lg font-semibold text-gray-700 mb-2">Pilih Status</label>
                        <select class="form-select block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600" id="status" wire:model="status">
                            <option value="{{$status}}" class="text-gray-600">{{$status}}</option>
                            <option value="cuti" class="text-gray-600">Cuti</option>
                            <option value="rest" class="text-gray-600">Rest</option>
                            <option value="siaga" class="text-gray-600">Siaga</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Save
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
