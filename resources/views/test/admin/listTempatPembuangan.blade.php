


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel App</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light p-3">
                <h5>Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="#" class="nav-link">HOME PAGE</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">DAFTAR TPS / TPA</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Petugas</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Client</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Jadwal Pengambilan</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 bg-warning p-4">
                <!-- Title and Search -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Data TPS / TPA</h2>
                    <input type="text" class="form-control w-25" placeholder="Searching...">

                </div>

                <!-- Sorting -->

                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <label for="sort" class="form-label">Urutkan Berdasar:</label>
                        <select id="sort" class="form-select w-25">
                            <option value="nama">Nama</option>
                            <option value="lokasi">Lokasi</option>
                        </select>
                        <a href="/test/admin/TempatPembuangan/register">add</a>

                    </div>



                <!-- TPS Grid -->
                <div class="row g-3">
                    @php
                        //dd($tempat_pembuangans)
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
                                <a href="/test/admin/TempatPembuangan/{{$tempat->id}}">detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
