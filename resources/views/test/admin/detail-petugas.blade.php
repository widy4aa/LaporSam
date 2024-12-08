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
            <li class="list-group-item"><strong>ID:</strong>{{$petugas['id']}}</li>
            <li class="list-group-item"><strong>Nama:</strong>{{$petugas['name']}}</li>
            <li class="list-group-item"><strong>Username:</strong> {{$petugas['username']}}</li>
            <li class="list-group-item"><strong>Kecamatan:</strong> {{$petugas['kecamatan']}}</li>
            <li class="list-group-item"><strong>Alamat Lengkap:</strong> {{$petugas['alamat_lengkap']}}</li>
            <li class="list-group-item"><strong>Point:</strong> {{$petugas['point']}}</li>
            <li class="list-group-item"><strong>Di Taruh Dimana:</strong> {{$petugas['tempat_pembuangan']}}</li>
            <li class="list-group-item"><strong>Role:</strong> {{$petugas['role']}}</li>
            <li class="list-group-item"><strong>Status:</strong> {{$petugas['status']}}</li>
            <li class="list-group-item">
                <img src="/storage/{{$petugas['link_gambar']}}" alt="Gambar Petugas" class="img-fluid" width="200">
            </li>
        </ul>
        <button class="btn btn-primary" wire:click="edit">Edit</button>
        <button class="btn btn-danger" wire:click="delete">Hapus</button>
        <a href="{{ url('/test/admin/Petugas/') }}" class="btn btn-secondary">Back</a>
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
            <div class="mb-3">
                <label for="role_petugas" class="form-label">Tempat Pembuangan</label>
                <select id="role_petugas" class="form-select" wire:model="editableData.id_tempat_pembuangan">
                        <option value="{{$editableData['tempat_pembuangan']}}">{{$editableData['tempat_pembuangan']}}</option>
                    @foreach ( $TempatPembuangan as $Tp )
                        <option value="{{$Tp->id}}">{{$Tp -> nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="role_petugas" class="form-label">Role Petugas</label>
                <select id="role_petugas" class="form-select" wire:model="editableData.role">
                    <option value="{{$editableData['role']}}">{{$editableData['role']}}</option>
                    <option value="lapangan">Lapangan</option>
                    <option value="penjaga">Penjaga</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" wire:click="cancel">Cancel</button>
        </form>
    @endif
</div>
