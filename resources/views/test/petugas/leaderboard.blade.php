<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <h2 class="text-center mb-4">Leaderboard</h2>
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Leaderboard</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Kecamatan</th>
                            <th>Penempatan</th>
                            <th>Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                           // dd($petugas);
                            $no = 1;
                        @endphp
                        @foreach ($petugas as $p )
                        <tr>
                            <th>{{$no++}}</th>
                            <th>{{$p->id}}</th>
                            <th>{{$p->name}}</th>
                            <th>{{$p->kecamatan->kecamatan}}</th>
                            <th>{{$p->petugas[0]->tempat_pembuangan->nama}}</th>
                            <th>{{$p->point}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
