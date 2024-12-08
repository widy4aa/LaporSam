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
        <h2>Detail TPS</h2>
        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>ID:</strong> {{ $tps['id'] }}</li>
            <li class="list-group-item"><strong>Nama:</strong> {{ $tps['nama'] }}</li>
            <li class="list-group-item"><strong>Deskripsi:</strong> {{ $tps['deskripsi'] }}</li>
            <li class="list-group-item"><strong>Kecamatan:</strong> {{ $tps['kecamatan'] }}</li>
            <li class="list-group-item"><strong>Daya Tampung:</strong> {{ $tps['daya_tampung'] }}</li>
            <li class="list-group-item">
                <img src="/storage/{{$tps['link_gambar'] }}" alt="Gambar TPS" class="img-fluid" width="200">
            </li>
        </ul>
        <button class="btn btn-primary" wire:click="edit">Edit</button>
        <button class="btn btn-danger" wire:click="delete">Hapus</button>
        <a href="{{ url('/test/admin/TempatPembuangan') }}" class="btn btn-secondary">Back</a>
    @else
        <!-- Editable Form -->
        <h2>Edit TPS</h2>
        <form wire:submit.prevent="save">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" class="form-control" wire:model="editableData.nama">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea id="description" class="form-control" wire:model="editableData.deskripsi"></textarea>
            </div>
            <div class="mb-3">
                <label for="daya_tampung" class="form-label">Daya Tampung</label>
                <input type="text" id="daya_tampung" class="form-control" wire:model="editableData.daya_tampung">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" id="gambar" class="form-control" wire:model="editableData.link_gambar">
                @if (is_object($editableData['link_gambar']) && method_exists($editableData['link_gambar'], 'temporaryUrl'))
                    <!-- Preview gambar baru -->
                    <img src="{{ $editableData['link_gambar']->temporaryUrl() }}" alt="Preview Gambar" class="img-fluid mt-2" width="200">
                @elseif($editableData['link_gambar'])
                    <!-- Preview gambar lama -->
                    <img src="{{ asset('storage/' . $editableData['link_gambar']) }}" alt="Gambar Lama" class="img-fluid mt-2" width="200">
                @endif
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" wire:click="cancel">Cancel</button>
        </form>
    @endif
</div>
