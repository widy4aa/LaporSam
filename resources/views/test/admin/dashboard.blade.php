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
    <a href="#">Petugas</a>
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

</body>
</html>
