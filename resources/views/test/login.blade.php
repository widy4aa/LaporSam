<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laporsam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Nord Color Scheme */
        body {
            background-color: #2E3440; /* Nord Polar Night */
            color: #D8DEE9;           /* Nord Snow Storm */
        }
        .card {
            background-color: #3B4252; /* Slightly lighter than body background */
            border: none;
            color: #ECEFF4;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }
        .form-control {
            background-color: #4C566A;
            border: 1px solid #434C5E;
            color: #ECEFF4;
        }
        .form-control::placeholder {
            color: #D8DEE9;
        }
        .form-control:focus {
            background-color: #4C566A;
            border-color: #88C0D0;
            color: #ECEFF4;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #5E81AC;
            border-color: #5E81AC;
        }
        .btn-primary:hover {
            background-color: #81A1C1;
            border-color: #81A1C1;
        }
        a {
            color: #88C0D0;
        }
        a:hover {
            color: #81A1C1;
        }
        .error-message {
            background-color: #BF616A;
            color: #ECEFF4;
            padding: 0.5rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-4" style="width: 100%; max-width: 400px;">
            <div class="text-center mb-3">
                <img src="https://i.ibb.co/RgLk3pK/Group-3.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
            </div>
            <form action="{{ route('loginProses') }}" method="POST">
                @if($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
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
                    <a href="#" class="text-decoration-none">Ga Punya Akun? Daftar</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
