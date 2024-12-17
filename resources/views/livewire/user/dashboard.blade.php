<div>
    <div class="min-h-screen bg-gray-100 flex justify-center items-center px-4 py-10">
        <div class="flex flex-col lg:flex-row items-center gap-8 w-full max-w-7xl rounded-lg">
          <!-- Tabel History -->

          <div class="w-full lg:w-3/5 bg-white shadow-lg rounded-xl p-4">
            <div class="bg-[#5E81AC] text-white rounded-t-md px-4 py-3">
              <div class="flex justify-between items-center">
                <h3 class="font-semibold text-2xl">History</h3>
                <button class="bg-white text-[#5E81AC] hover:bg-[#D8DEE9] px-3 py-1 rounded-full text-sm" wire:click="history">
                  Lihat Semua
                </button>
              </div>
            </div>
            <table class="w-full mt-4">
              <thead>
                <tr class="bg-[#D8DEE9]">
                  <th class="py-2 px-4 text-left font-medium">No</th>
                  <th class="py-2 px-4 text-left font-medium">Nama</th>
                  <th class="py-2 px-4 text-left font-medium">Metode</th>
                  <th class="py-2 px-4 text-left font-medium">Berat (KG)</th>
                  <th class="py-2 px-4 text-left font-medium">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($history_sampah as $sampah )
                <tr>
                    <td class="py-2 px-4">{{$sampah->id}}</td>
                    <td class="py-2 px-4">{{$sampah->nama_pengguna}}</td>
                    <td class="py-2 px-4">{{$sampah->metode}}</td>
                    <td class="py-2 px-4">{{$sampah->berat}}</td>
                    <td class="py-2 px-4">{{$sampah->status}}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>

          <!-- Card Action -->
          <div class="grid grid-cols-2 gap-6">
            <!-- Buang -->
            <div class="bg-[#A3BE8C] text-white shadow-lg rounded-xl p-20 flex flex-col items-center hover:scale-105 transition-transform" live>
              <img src="https://img.icons8.com/pulsar-color/100/throw-away.png" class="w-16 h-16 mb-2" />
              <a href="/user/buang" class="text-lg font-medium" >Buang</a>
            </div>

            <!-- Lihat TPS -->
            <div class="bg-[#81A1C1] text-white shadow-lg rounded-xl p-20 flex flex-col items-center hover:scale-105 transition-transform">
              <img src="https://img.icons8.com/ios-filled/50/ffffff/marker.png" class="w-16 h-16 mb-2" />
              <a href="/user/listTps " class="text-lg font-medium" wire:click="">Lihat TPS</a>
            </div>

            <!-- Peringkat -->
            <div class="bg-[#EBCB8B] text-white shadow-lg rounded-xl p-20 flex flex-col items-center hover:scale-105 transition-transform">
              <img src="https://img.icons8.com/ios-filled/50/ffffff/prize.png" class="w-16 h-16 mb-2" />
              <a href="/user/leaderboard" class="text-lg font-medium" wire:click="leaderboard" >leaderboard</a>
            </div>

            <!-- Keluar -->
            <div class="bg-[#BF616A] text-white shadow-lg rounded-xl p-20 flex flex-col items-center hover:scale-105 transition-transform">
              <img src="https://img.icons8.com/ios-filled/50/ffffff/exit.png" class="w-16 h-16 mb-2" />
              <p class="text-lg font-medium" wire:click="logout">Keluar</p>
            </div>
          </div>
        </div>
      </div>
</div>
