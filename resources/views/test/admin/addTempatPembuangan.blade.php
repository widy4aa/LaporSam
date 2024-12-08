<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel App</title>

</head>
<body>
    <div class="container mt-4">
        <h2>Form Tambah Tempat Pembuangan</h2>
        <form action="/test/admin/TempatPembuangan/add/proses" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>

            <!-- Daya Tampung -->
            <div class="mb-3">
                <label for="daya_tampung" class="form-label">Daya Tampung</label>
                <input type="number" class="form-control" id="daya_tampung" name="daya_tampung" step="0.01" required>
            </div>

            <!-- Jenis -->
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <select class="form-select" id="jenis" name="jenis" required>
                    <option value="TPS">TPS</option>
                    <option value="TPA">TPA</option>
                </select>
            </div>

            <!-- Kecamatan -->
            <div class="mb-3">
                <label for="id_kecamatan" class="form-label">Kecamatan</label>
                <select class="form-select" id="id_kecamatan" name="id_kecamatan" required>
                    <!-- Contoh Option Kecamatan -->
                    <option value="">Pilih Kecamatan</option>
                    @foreach ($kecamatans as $kecamatan )
                        <option value="{{$kecamatan->id}}">{{$kecamatan->kecamatan}}</option>
                    @endforeach

                </select>
            </div>

            <!-- Link Gambar -->
            <div class="mb-3">
                <label for="link_gambar" class="form-label">Upload Gambar</label>
                <input type="file" class="form-control" id="link_gambar" name="link_gambar" accept="image/*">
            </div>

            <!-- Lokasi (Point) -->
            <div class="mb-3">
                <label for="location" class="form-label">Lokasi (Latitude, Longitude)</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Contoh: -7.250445, 112.768845" required>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn">Submit</button>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
