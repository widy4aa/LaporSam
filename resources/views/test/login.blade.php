<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laporsam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-4" style="width: 100%; max-width: 400px;">
            <h4 class="text-center mb-4">Laporsam/Logo</h4>
            <form action="{{ route('loginProses') }}" method="POST">
                @if($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}<p>
                        @endforeach
                    </ul>
                </div>
            @endif
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                </div>
                <div class="text-center mb-3">
                    <a href="#  " class="text-decoration-none">Ga Punya Akun? Daftar</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
