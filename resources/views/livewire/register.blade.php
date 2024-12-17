<div class="max-w-lg mx-auto mt-10 p-6 bg-gray-800 text-gray-200 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6 text-center">Form Register</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-600 text-white rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="register" class="space-y-4">
        <!-- Nama -->
        <div>
            <label class="block mb-1 text-sm font-medium">Nama</label>
            <input type="text" wire:model="name" placeholder="Nama Lengkap"
                   class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Username -->
        <div>
            <label class="block mb-1 text-sm font-medium">Username</label>
            <input type="text" wire:model="username" placeholder="Username"
                   class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('username') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Alamat Lengkap -->
        <div>
            <label class="block mb-1 text-sm font-medium">Alamat Lengkap</label>
            <textarea wire:model="alamat_lengkap" placeholder="Alamat Lengkap"
                      class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            @error('alamat_lengkap') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>
        <!-- Role -->
        <div>
            <label class="block mb-1 text-sm font-medium">Role</label>
            <select wire:model="id_kecamatan"
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">pilih kecamatan</option>
                @foreach ($dataKecamatan as $kec )
                <option value="{{$kec->id}}">{{$kec->kecamatan}}</option>
                @endforeach
            </select>
            @error('kecamatan') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block mb-1 text-sm font-medium">Password</label>
            <input type="password" wire:model="password" placeholder="Password"
                   class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div>
            <label class="block mb-1 text-sm font-medium">Konfirmasi Password</label>
            <input type="password" wire:model="password_confirmation" placeholder="Konfirmasi Password"
                   class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <!-- Longitude dan Latitude -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 text-sm font-medium">Longitude</label>
                <input type="text" wire:model="longitude" id="longitude" placeholder="Longitude"
                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('longitude') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">Latitude</label>
                <input type="text" wire:model="latitude" id="latitude" placeholder="Latitude"
                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('latitude') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Tombol Generate Koordinat -->
            <div class="col-span-2">
                <button type="button" onclick="generateLocation()"
                        class="w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Generate Koordinat
                </button>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit"
                    class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Register
            </button>
        </div>
    </form>

    <script>
        function generateLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    document.getElementById('longitude').value = position.coords.longitude;
                    document.getElementById('latitude').value = position.coords.latitude;
                }, (error) => {
                    alert('Gagal mendapatkan lokasi: ' + error.message);
                });
            } else {
                alert('Geolokasi tidak didukung di browser ini.');
            }
        }
    </script>
</div>
