<div>
    <div class="container mx-auto p-6 bg-inherit">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Data TPS/TPA</h1>

        <div class="flex justify-between items-center mb-6">
            <div class="flex">
                <input
                    type="text"
                    wire:model="query"
                    placeholder="Cari TPS/TPA"
                    class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-sky-500">
                <button
                    wire:click="search"
                    class="ml-2 px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600"
                >
                    Cari
                </button>
            </div>
            <button
            wire:click="addTempat"
            class="ml-2 px-8 py-4 bg-green-500 text-white rounded-lg hover:bg-green-600">
            Tambah
        </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($tempats as $t )
            <a href="/detail"
                class="block bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200">
                <img src="/storage/{{$t->link_gambar}}" alt="TPS 1" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800">{{$t->nama}}</h2>
                    <p>{{$t->deskripsi}}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
