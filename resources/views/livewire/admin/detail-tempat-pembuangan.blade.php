<div>
    <div class="container mx-auto p-6 bg-inherit">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Detail TPS</h1>

            <div class="mb-6">
                <div class="flex justify-between">
                    <div class="w-1/2">
                        <p class="text-lg font-semibold text-gray-700">ID: <span class="text-gray-500">01</span></p>
                        <p class="text-lg font-semibold text-gray-700">Nama Tempat: <span class="text-gray-500">TPS 1</span>
                        </p>
                        <p class="text-lg font-semibold text-gray-700">Deskripsi: <span class="text-gray-500">Tempat
                                Penampungan Sementara</span></p>
                        <p class="text-lg font-semibold text-gray-700">Kecamatan: <span class="text-gray-500">Tanjung
                                Priok</span></p>
                        <p class="text-lg font-semibold text-gray-700">Daya Tampung: <span class="text-gray-500">1000
                                Kg</span></p>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <img src="https://i.ibb.co.com/VghYZqx/tps.jpg" alt="Foto TPS"
                    class="w-64 h-32 rounded-lg object-cover mt-2">
            </div>

            <div class="flex space-x-4">
                <a href="/edittp"
                    class="px-6 py-2 bg-sky-900 text-gray-100 rounded-lg hover:bg-sky-600 transition duration-200">
                    Edit
                </a>

                <form action="#" onsubmit="return confirm('Apakah Anda yakin ingin menghapus TPS ini?');">
                    <button type="submit"
                        class="px-6 py-2 bg-red-900 text-gray-100 rounded-lg hover:bg-red-600 transition duration-200">
                        Hapus
                    </button>
                </form>

                <a href="/tp"
                    class="px-6 py-2 bg-gray-900 text-gray-100 rounded-lg hover:bg-gray-600 transition duration-200">
                    Kembali
                </a>
            </div>
        </div>
    </div>{{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
</div>
