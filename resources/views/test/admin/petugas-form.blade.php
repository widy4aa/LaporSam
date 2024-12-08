<div class="container mt-4">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($step === 1)
        <!-- Langkah 1: Form User -->
        <h2>Form Data Petugas</h2>
        <form wire:submit.prevent="nextStep">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" class="form-control" wire:model="forUser.name">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" class="form-control" wire:model="forUser.username">
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <select id="role" class="form-select" wire:model="forUser.id_kecamatan">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach ($kecamatans as $kecamatan )
                        <option value="{{$kecamatan->id}}">{{$kecamatan->kecamatan}}</option>
                    @endforeach
                </select></div>
            <div class="mb-3">
                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                <textarea id="alamat_lengkap" class="form-control" wire:model="forUser.alamat_lengkap"></textarea>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" wire:model="forUser.password">
            </div>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    @elseif ($step === 2)
        <!-- Langkah 2: Form Petugas -->
        <h2>Form Tentang Penugasan</h2>
        <form wire:submit.prevent="savePetugas">
            <div class="mb-3">
                <label for="id_tempat_pembuangan" class="form-label">Tempat Pembuangan</label>
                <select id="id_tempat_pembuangan" class="form-select" wire:model="forPetugas.id_tempat_pembuangan">
                    <option value="">-- Pilih Tempat Pembuangan --</option>
                    @foreach($tempatPembuangans as $tempat)
                        <option value="{{ $tempat->id }}">{{ $tempat->nama }}</option>
                    @endforeach
                </select>            </div>
            <div class="mb-3">
                <label>Status</label>
                <div>
                    <div class="form-check">
                        <input type="radio" id="status_rest" value="rest" class="form-check-input" wire:model="forPetugas.status">
                        <label for="status_rest" class="form-check-label">Rest</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="status_siaga" value="siaga" class="form-check-input" wire:model="forPetugas.status">
                        <label for="status_siaga" class="form-check-label">Siaga</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="status_cuti" value="cuti" class="form-check-input" wire:model="forPetugas.status">
                        <label for="status_cuti" class="form-check-label">Cuti</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="role_petugas" class="form-label">Role Petugas</label>
                <select id="role_petugas" class="form-select" wire:model="forPetugas.role">
                    <option value="">-- Pilih Role Petugas --</option>
                    <option value="lapangan">Lapangan</option>
                    <option value="penjaga">Penjaga</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-secondary" wire:click="$set('step', 1)">Back</button>
        </form>
    @endif
</div>
