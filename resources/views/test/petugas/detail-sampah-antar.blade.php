<div class="container mt-4">
    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @php
    @endphp
    <!-- Form Detail -->
    @if (!$isEditing)
        <h2>Detail Sampah</h2>
        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>ID:</strong> {{ $sampah['id'] }}</li>
            <li class="list-group-item"><strong>Nama Pembuang:</strong> {{$sampah['nama_pembuang'] }}</li>
            <li class="list-group-item"><strong>Kecamatan:</strong> {{ $sampah['kecamatan'] }}</li>
            <li class="list-group-item"><strong>Berat:</strong> {{ $sampah['berat'] }}</li>
            <li class="list-group-item"><strong>Status:</strong> {{ $sampah['berat'] }}</li>
            <li class="list-group-item"><strong>Metode:</strong> {{ $sampah['metode'] }}</li>
            <li class="list-group-item"><strong>Lokasi Maps:</strong>  <a href="https://www.google.com/maps?q={{$sampah['lat']}},{{$sampah['longt']}}" target="_blank">
                Lihat
            </a></li>


        </ul>
        <button class="btn btn-primary" wire:click="edit">Acc</button>
        <button class="btn btn-danger" wire:click="delete">Hapus</button>
        <a href="{{ url('/test/admin/TempatPembuangan') }}" class="btn btn-secondary">Back</a>
    @else
        <!-- Editable Form -->
        <h2>Apakah Berat Sampah Sudah Benar?</h2>
        <form wire:submit.prevent="save">
            <div class="mb-3">
                <label for="berat" class="form-label">Berat</label>
                <input type="numeric" id="berat" class="form-control" wire:model="editableData.berat">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" wire:click="cancel">Cancel</button>
        </form>
    @endif
</div>
