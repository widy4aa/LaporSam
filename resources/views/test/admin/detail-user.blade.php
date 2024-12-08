<div class="container mt-4">
    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form Detail -->
    @if (!$isEditing)
        <h2>Detail TPS</h2>
        <ul class="list-group mb-3">
            @php
              // dd($editableData['username'])
        @endphp
            <li class="list-group-item"><strong>ID:</strong>{{$user['id']}}</li>
            <li class="list-group-item"><strong>Nama:</strong>{{$user['name']}}</li>
            <li class="list-group-item"><strong>Username:</strong> {{$user['username']}}</li>
            <li class="list-group-item"><strong>Kecamatan:</strong> {{$user['kecamatan']}}</li>
            <li class="list-group-item"><strong>Alamat Lengkap:</strong> {{$user['alamat_lengkap']}}</li>
            <li class="list-group-item"><strong>Point:</strong> {{$user['point']}}</li>
            <li class="list-group-item">
                <img src="/storage/{{$user['link_gambar']}}" alt="Gambar user" class="img-fluid" width="200">
            </li>
        </ul>
        <button class="btn btn-primary" wire:click="edit">Edit</button>
        <button class="btn btn-danger" wire:click="delete">Hapus</button>
        <a href="{{ url('/test/admin/User/') }}" class="btn btn-secondary">Back</a>
    @else
        <!-- Editable Form -->
        <h2>Edit TPS</h2>
        <form wire:submit.prevent="save">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" class="form-control" wire:model="editableData.username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" id="password" class="form-control" wire:model="editableData.password" >
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" wire:click="cancel">Cancel</button>
        </form>
    @endif
</div>
