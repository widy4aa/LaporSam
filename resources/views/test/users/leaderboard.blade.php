<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background-color: #f8f9fa; /* Warna abu-abu muda sebagai dasar wireframe */
        }
        .container-fluid {
            background-color: white; /* Latar belakang utama putih */
            height: 100vh;
            display: flex;
            flex-direction: column;
            border: 1px solid #dee2e6; /* Garis luar untuk wireframe */
        }
        .header {
            background-color: #e9ecef; /* Latar belakang abu-abu terang */
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .circle {
            width: 20px;
            height: 20px;
            background-color: white;
            border: 1px solid #dee2e6; /* Outline lingkaran */
            border-radius: 50%;
        }
        .content {
            flex: 1;
            display: flex;
            padding: 20px;
            gap: 20px;
        }
        .history {
            flex: 1;
            background-color: #e9ecef; /* Latar belakang abu-abu terang untuk kotak "History" */
            border: 1px solid #dee2e6; /* Outline kotak */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-weight: bold;
        }
        .buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .buttons .btn {
            height: 100px;
            background-color: #e9ecef; /* Latar belakang abu-abu terang untuk tombol */
            border: 1px solid #dee2e6; /* Outline tombol */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <div class="header d-flex align-items-center justify-content-between">
            <span class="fs-5 fw-bold">Leaderboard</span>
            <div class="circle"></div>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- History Section -->
            <div class="history">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pengguna</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Point</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $Nomor = 1 ;
                        @endphp
                        @foreach ($users as $user )
                            <tr>
                                <td>{{$Nomor ++ ;}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->kecamatan}}</td>
                                <td>{{$user->point}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>

            <!-- Buttons Section -->
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
