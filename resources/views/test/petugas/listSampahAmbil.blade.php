<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1e1e1e; /* Warna hitam */
            color: white;
        }
        .sidebar {
            background-color: #b8b8b8; /* Sidebar abu-abu */
            padding: 20px;
            height: 100vh;
        }
        .main-content {
            background-color: yellow; /* Konten utama */
            padding: 20px;
            height: 100vh;
        }
        .table-container {
            background-color: #d3d3d3; /* Tabel abu-abu */
            padding: 15px;
            border-radius: 5px;
        }
        .action-btns {
            display: flex;
            gap: 5px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <h3>Text</h3>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">HOME PAGE</a>
                    <a href="#" class="list-group-item list-group-item-action">Persetujuan Sampah</a>
                    <a href="#" class="list-group-item list-group-item-action">Ambil Sampah</a>
                    <a href="#" class="list-group-item list-group-item-action">Leaderboard</a>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col-md-9 main-content">
                <h4>Acc</h4>
                <div class="table-container">
                    <table class="table table-bordered text-dark">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Berat</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            <!-- Data Dinamis atau Statis -->
                            @foreach ($sampahs as $sampah )
                            <tr>
                                <td>{{$no+1}}</td>
                                <td>{{$sampah->id}}</td>
                                <td>{{$sampah->user->name}}</td>
                                <td>{{$sampah->berat}}</td>
                                <td>{{$sampah->status}}</td>
                                <td>
                                    <div class="action-btns">
                                        <button class="btn btn-primary btn-sm"><a href="/test/petugas/sampah/ambil/{{$sampah->id}}">Detail</a></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
