<div class="container mt-5">
    @if ($step === 1)
        <h2 class="mb-4">Step 1: Data Pengguna</h2>
        <div class="mb-3">
            <label for="berat" class="form-label">Berat</label>
            <input type="numeric" id="name" wire:model="formData.berat" class="form-control" placeholder="Masukkan Berat">
        </div>
        <div class="mb-3">
            <label for="Metode" class="form-label">Metode</label>
            <select id="Metode" class="form-select" wire:model="formData.metode">
                <option value="">Pilih Metode Pembuangan</option>
                <option value="antar">Antar</option>
                <option value="ambil">Ambil</option>
            </select>
        </div>
        <div class="d-flex gap-2">
            <button wire:click="nextStep" class="btn btn-primary">Next</button>
            <button wire:click="cancel" class="btn btn-secondary">Cancel</button>
        </div>

    @elseif ($step === 2)
    @php

    @endphp
        @if ($formData['metode'] == 'antar')
        <h1>form list</h1>
        <div class="row g-3">
            @php
            @endphp
            @foreach($tempat_pembuangans as $tempat)
            <div class="col-md-4">
                <div class="card">
                    <img src="/storage/{{$tempat['link_gambar'] }}" class="card-img-top" alt="tempat_pembuangan">
                    <div class="card-body">
                        <p class="card-text"><b>{{ $tempat->nama }}</b></p>
                        <p class="card-text">{{ $tempat->deskripsi }}</p>
                        <p class="card-text">{{ $tempat->jenis}}</p>
                        <p class="card-text">{{ $tempat->kecamatan->kecamatan}}</p>
                        <p class="card-text">{{ $tempat->jumlah_penjaga}}</p>
                        <a class="btn btn-secondary" wire:click="pilihTempat({{$tempat->id}})">Pilih</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        @elseif ($formData['metode'] == 'ambil')
        <h1>Pilih Petugas Ambil</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kecamatan</th>
                    <th>Tempat Pembuangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $No = 1 ;
                @endphp

                @foreach ($dataPetugasAmbil as $petugas )
                <tr>
                    <td>{{$No ++;}}</td>
                    <td>{{$petugas->name}}</td>
                    <td>{{$petugas->kecamatan->kecamatan}}</td>
                    <td>{{$petugas->petugas[0]->tempat_pembuangan->nama}}</td>
                    <td><button class="btn btn-primary" wire:click="pilihPetugas({{$petugas->petugas[0]->id}})">Pilih</button></td>
                </tr>
                @endforeach
            </tbody>
        @endif

    @endif

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
