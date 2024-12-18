<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #2f2f2f;
            color: white;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            background-color: #b0b0b0;
            padding: 20px;
            width: 200px;
            height: 100vh;
            position: fixed;
        }
        .sidebar a {
            text-decoration: none;
            color: black;
            padding: 10px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #ddd;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
        }
        .header {
            background-color: #e0e0e0;
            padding: 20px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .stats-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
            margin-top: 20px;
        }
        .stat-box {
            background-color: #bdbdbd;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .stat-box h2 {
            margin: 0;
        }
        .yellow-background {
            background-color: yellow;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
@php
@endphp
<body>

<div class="sidebar">
    <h2>Text</h2>
    <a href="#">HOME PAGE</a>
    <a href="/test/admin/TempatPembuangan">DAFTAR TPS / TPA</a>
    <a href="/test/admin/Petugas">Petugas</a>
    <a href="#">Client</a>
</div>

<div class="main-content">
    <div class="header">
        <h1>Home Page Admin</h1>
    </div>

    <div class="yellow-background">
        <h2>Text</h2>
    </div>

    <div class="stats-container">
        <div class="stat-box">
            <h2>Jumlah user</h2>
            <p>{{$jumlahUser}}</p>
        </div>
        <div class="stat-box">
            <h2>Jumlah petugas</h2>
            <p>{{$jumlahPetugas}}</p>
        </div>
        <div class="stat-box">
            <h2>TPA Sering Di Buang</h2>
            <p>TPS 3</p>
        </div>
        <div class="stat-box">
            <h2>Kecamatan Jumlah User Banyak</h2>
            <p>Kecamatan A</p>
        </div>
    </div>
</div>
<img src="data:image/png;base64,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" alt="" height="100px">

</body>
</html>
