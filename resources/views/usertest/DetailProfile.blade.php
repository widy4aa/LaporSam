<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        detail_profil
    </h1>
     <p>id</p>
     <p>Username</p>
     <p>Name</p>
     <p>Password</p>
     <p>Gambar</p>
     <p>role</p>
     <p>location</p>
     <p>point</p>
     <p>alamat lengkap</p>
     <p>id_kecamatan</p>
     <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Username</th>
            <th scope="col">Name</th>
            <th scope="col">Password</th>
            <th scope="col">Gambar</th>
            <th scope="col">role</th>
            <th scope="col">location</th>
            <th scope="col">point</th>
            <th scope="col">alamat lengkap</th>
            <th scope="col">id_kecamatan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
      </table>

    <div class="container">
    <h1>Update Data</h1>
    <form id="updateForm" method="POST" action="{{ route('update.route') }}">
        @csrf
        @method('PUT')

        <!-- Contoh Field Read-Only -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" readonly>
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex gap-2">
            <button type="button" id="editButton" class="btn btn-primary">Edit</button>
            <button type="submit" id="saveButton" class="btn btn-success" style="display: none;">Save</button>
            <button type="button" id="cancelButton" class="btn btn-secondary" style="display: none;">Cancel</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('editButton').addEventListener('click', function () {
        // Ubah semua input jadi editable
        document.querySelectorAll('#updateForm input').forEach(input => input.removeAttribute('readonly'));

        // Tampilkan tombol Save dan Cancel, sembunyikan tombol Edit
        document.getElementById('saveButton').style.display = 'inline-block';
        document.getElementById('cancelButton').style.display = 'inline-block';
        this.style.display = 'none';
    });

    document.getElementById('cancelButton').addEventListener('click', function () {
        // Kembalikan semua input ke kondisi read-only
        document.querySelectorAll('#updateForm input').forEach(input => input.setAttribute('readonly', true));

        // Reset nilai input ke nilai awal
        document.getElementById('name').value = "{{ $data->name }}";
        document.getElementById('email').value = "{{ $data->email }}";

        // Tampilkan tombol Edit, sembunyikan tombol Save dan Cancel
        document.getElementById('editButton').style.display = 'inline-block';
        document.getElementById('saveButton').style.display = 'none';
        this.style.display = 'none';
    });
</script>

</body>
</html>

