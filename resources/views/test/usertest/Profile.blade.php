<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>profile</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Username</th>
            <th scope="col">Name</th>
            <th scope="col">Gambar</th>
            <th scope="col">role</th>
            <th scope="col">location</th>
            <th scope="col">point</th>
            <th scope="col">alamat lengkap</th>
            <th scope="col">id_kecamatan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id }}</td>
                    <td>{{$user->username }}</td>
                    <td>{{$user->name }}</td>
                    <td>{{$user->link_gambar }}</td>
                    <td>{{$user->role }}</td>
                    <td>
                        {{$user->lat}} and {{$user->longt}}
                        <a href="https://www.google.com/maps?q={{$user->lat}},{{$user->longt}}" target="_blank">
                            Lihat Lokasi di Google Maps
                        </a>
                    </td>
                    <td>{{$user->point }}</td>
                    <td>{{$user->alamat_lengkap }}</td>
                    <td>{{$user->kecamatan}}</td>
                    <td>
                        <a href="/testDetailProfile/{{$user->username}}"> view</a>
                        <form action="/deleteUser/{{$user->username}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tr>
        </tbody>
      </table>

      <div class="d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>
