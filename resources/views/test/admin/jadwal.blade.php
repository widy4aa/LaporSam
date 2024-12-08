<div class="container mt-5">
    <h2 class="mb-4">Jadwal</h2>

    <div class="mb-4 p-4 bg-light rounded">
        <form wire:submit.prevent="addJadwal">
            <div class="row mb-3">
                <div class="col">
                    <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                    <input type="time" id="waktu_mulai" class="form-control" wire:model="waktu_mulai">
                    @error('waktu_mulai') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col">
                    <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                    <input type="time" id="waktu_selesai" class="form-control" wire:model="waktu_selesai">
                    @error('waktu_selesai') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0 ;
                @endphp
                @foreach ($jadwals as $jadwal )
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $jadwal->waktu_mulai }}</td>
                    <td>{{ $jadwal->waktu_berakhir }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" wire:click="deleteJadwal({{ $jadwal->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
