<div>
    {{-- Do your work, then step back. --}}
    @if (session()->has('success'))
    <div class="mx-48 mt-6 bg-green-100 border-green-500 shadow-md rounded-lg p-6 ">
        <div class="alert alert-success text-xl ">
            {{ session('success') }}
        </div>
    </div>
    @endif
    @if (session()->has('deleteDone'))
    <div class="mx-48 mt-6 bg-yellow-100 border-yellow-500 shadow-md rounded-lg p-6 ">
        <div class="alert alert-success text-xl ">
            {{ session('deleteDone') }}
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
        <div class="bg-white shadow-md rounded-lg p-6 ">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Data Client</h1>
            <div class="flex justify-between items-center mb-6">
                <div class="flex">
                    <input
                        type="text"
                        wire:model="query"
                        placeholder="Cari Petugas"
                        class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-sky-500">
                    <button
                        wire:click="search"
                        class="ml-2 px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600"
                    >
                        Cari
                    </button>
                </div>
                {{-- <button
                wire:click="addClient"
                class="ml-2 px-8 py-4 bg-green-500 text-white rounded-lg hover:bg-green-600">
                Tambah
            </button> --}}
            </div>

            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead class="bg-gray-700 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">Username</th>
                        <th class="py-3 px-6 text-left">Kecamatan</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $No = 1;

                    @endphp
                    @foreach ($client as $c)
                    <tr class="hover:bg-gray-100">
                        <td class="border-t py-3 px-6">{{$No++;}}</td>
                        <td class="border-t py-3 px-6">{{$c->name}}</td>
                        <td class="border-t py-3 px-6">{{$c->username}}</td>
                        <td class="border-t py-3 px-6">{{$c->kecamatan->kecamatan}}</td>
                        <td>
                            <a
                            href="/admin/client/{{$c->id}}"
                            class="px-6 mx-2 py-2 bg-yellow-500 text-gray-100 rounded-lg hover:bg-yellow-600 transition duration-200">
                            Detail
                        </a>
                        </td>

                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
