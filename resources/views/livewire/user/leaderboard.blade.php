<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="flex justify-start px-24 py-2 w-full">
        <img
            src="https://img.icons8.com/ios/100/left--v1.png"
            alt="Back Button"
            class="w-14 h-14 cursor-pointer"
            onclick="window.history.back();"
            >
    </div>
    <div class="container mx-auto my-4 px-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <h1 class="text-4xl font-bold mb-6 px-12 pt-8">Leaderboard</h1>
            <div class="p-4 overflow-x-auto">
                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Nama</th>
                            <th class="border border-gray-300 px-4 py-2">Kecamatan</th>
                            <th class="border border-gray-300 px-4 py-2">Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($petugas as $p)
                        <tr class="even:bg-gray-100 odd:bg-white hover:bg-yellow-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $no++ }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $p->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $p->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $p->kecamatan->kecamatan }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $p->point }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
