<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    document.getElementById('location').value = `${longitude}, ${latitude}`;
                }, function (error) {
                    alert('Gagal mendapatkan lokasi. Pastikan izin lokasi diaktifkan.');
                });
            } else {
                alert('Geolocation tidak didukung oleh browser Anda.');
            }
        }
    </script>

@php
//dd($kecamatans);
@endphp

</head>
<body>
    <h2>Form Registrasi</h2>
    <form action="/addUser" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="pass">pass:</label>
        <input type="text" id="pass" name="password" required><br><br>

        <label for="gambar">Upload Gambar:</label>
        <input type="file" id="gambar" name="gambar" accept="image/*" required><br><br>

        <label for="location">Location (Longitude, Latitude):</label>
        <input type="text" id="location" name="location" readonly required>
        <button type="button" onclick="getLocation()">Get Location</button><br><br>


        <label for="alamat_lengkap">Alamat Lengkap:</label>
        <input type="text" id="alamat_lengkap" name="alamat_lengkap" required><br><br>

        <label for="kecamatan">Kecamatan</label>
        <select id="kecamatan" name="kecamatan" placeholder="">
            @foreach ($kecamatans as $kecamatan )
                <option value={{$kecamatan->kecamatan}}>
                    {{$kecamatan->kecamatan}} </option>>
            @endforeach
        </select>
        <button type="submit">Register</button>
    </form>
</body>

</html>

