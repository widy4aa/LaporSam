<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

@php
$kecamatans = [
    'Wuluhan','Kencong','Gumukmas','Puger','Ambulu','Tempurejo','Silo','Mayang','Mumbulsari','Jenggawah','Ajung','Rambipuji','Balung','Umbulsari','Semboro','Jombang','Sumberbaru','Tanggul','Bangsalsari','Panti','Sukorambi','Arjasa','Pakusari','Kalisat','Ledokombo','Sumberjambe','Sukowono','Jelbuk','Kaliwates','Sumbersari','Patrang',
];
@endphp


</head>
<body>
    <h1>detail_profil</h1>

    <div class="container">
        <h1>Update Data</h1>
        <form id="updateForm" method="POST" action="#">
            @csrf
            @method('PUT')

            <!-- Contoh Field Read-Only -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" readonly>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $user->lat }} {{ $user->longt }}" readonly>
            </div>

            <div class="mb-3">
                <p>point {{$user->point}}</p>
            </div>

            <input list="kecamatan" name="kecamatan" value="{{$user->kecamatan}}">
            <datalist id="kecamatan">
                @foreach ($kecamatans as $kecamatan )
                    <option value={{$kecamatan}}>
                @endforeach
            </datalist>

            <select id="kecamatan" name="pilihan" required>
                <option value="" disabled selected>-- Pilih --</option>
                @foreach ($kecamatans as $kecamatan )
                    <option value={{$kecamatan}}>{{$kecamatan}}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                <input type="" class="form-control" id="alamat_lengkap" name="alamat_lengkap" value="{{ $user->alamat_lengkap }}" readonly>
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex gap-2">
                <button type="button" id="editButton" class="btn btn-primary">Edit</button>
                <button type="button" id="updateLocationButton" class="btn btn-warning" style="display: none;">Perbarui Lokasi</button>
                <button type="submit" id="saveButton" class="btn btn-success" style="display: none;">Save</button>
                <button type="button" id="cancelButton" class="btn btn-secondary" style="display: none;">Cancel</button>
            </div>
        </form>
    </div>

    <script>
        // Simpan nilai awal untuk rollback saat cancel
        const initialData = {
            name: "{{ $user->id }}",
            username: "{{ $user->username }}",
            location: "{{ $user->lat }} {{ $user->longt }}",
            kecamatan: "{{$user->kecamatan}}",
            alamat_lengkap: "{{$user->alamat_lengkap}}"
        };

        // Fungsi untuk meminta lokasi pengguna
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        const lat = position.coords.latitude;
                        const longt = position.coords.longitude;

                        // Update input location
                        const locationInput = document.getElementById('location');
                        locationInput.value = `${lat} ${longt}`;
                    },
                    function (error) {
                        alert('Gagal mendapatkan lokasi. Pastikan izin lokasi telah diberikan.');
                    }
                );
            } else {
                alert('Geolokasi tidak didukung oleh browser Anda.');
            }
        }

        // Event listener untuk tombol "Edit"
        document.getElementById('editButton').addEventListener('click', function () {
            // Ubah semua input jadi editable
            document.querySelectorAll('#updateForm input').forEach(input => input.removeAttribute('readonly'));

            // Tampilkan tombol Save, Cancel, dan Perbarui Lokasi
            document.getElementById('saveButton').style.display = 'inline-block';
            document.getElementById('cancelButton').style.display = 'inline-block';
            document.getElementById('updateLocationButton').style.display = 'inline-block';
            this.style.display = 'none';
        });

        // Event listener untuk tombol "Cancel"
        document.getElementById('cancelButton').addEventListener('click', function () {
            // Kembalikan semua input ke kondisi read-only
            document.querySelectorAll('#updateForm input').forEach(input => input.setAttribute('readonly', true));

            // Reset nilai input ke nilai awal
            document.getElementById('name').value = initialData.name;
            document.getElementById('username').value = initialData.username;
            document.getElementById('location').value = initialData.location;
            document.getElementById('kecamatan').value = initialData.kecamatan;
            document.getElementById('alamat_lengkap').value = initialData.alamat_lengkap;

            // Tampilkan tombol Edit, sembunyikan tombol lainnya
            document.getElementById('editButton').style.display = 'inline-block';
            document.getElementById('saveButton').style.display = 'none';
            document.getElementById('updateLocationButton').style.display = 'none';
            this.style.display = 'none';
        });

        // Event listener untuk tombol "Perbarui Lokasi"
        document.getElementById('updateLocationButton').addEventListener('click', function () {
            getLocation();
        });

        const input = document.getElementById('myInput');
        const datalist = document.getElementById('myOptions');
        const options = datalist.options;

        input.addEventListener('input', () => {
          const searchTerm = input.value.toLowerCase();
          for (let i = 0; i < options.length; i++) {
            const optionText = options[i].text.toLowerCase();
            if (optionText.startsWith(searchTerm)) {
              options[i].style.display = 'block';
            } else {
              options[i].style.display = 'none';
            }
          }
        });
    </script>
</body>
</html>
