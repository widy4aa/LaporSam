<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Form</title>
    <!-- Tambahkan link Bootstrap CSS -->
    @php
            $username = Session::get('username', 'Guest')
    @endphp
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .step-container {
            min-height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn-custom {
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header bg-light p-3 mb-4 d-flex justify-content-between align-items-center">
            <h5 class="m-0">Text</h5>
            <div class="circle bg-secondary rounded-circle" style="width: 20px; height: 20px;"></div>
        </div>

        <div class="step-container">
            <form method="POST" action="/test/dashboard/user/{{$username}}/buang/next" class="text-center">
                @csrf
                <input type="hidden" name="step" value="{{ $step }}">

                @if($step == 1)
                <h4>Step 1: Buang</h4>
                <input type="text" name="input1" class="form-control mb-3" placeholder="Input 1">
                <input type="text" name="input2" class="form-control mb-3" placeholder="Input 2">
                <button type="submit" name="next" class="btn btn-primary btn-custom">Next</button>

                @elseif($step == 2)
                <h4>Step 2: Jenis</h4>
                <button type="submit" name="option" value="petugas" class="btn btn-light mb-3">Pilih Petugas</button>
                <button type="submit" name="option" value="tempat" class="btn btn-light mb-3">Pilih Tempat</button>
                <div class="d-flex justify-content-between">
                    <button type="submit" name="back" class="btn btn-secondary btn-custom">Back</button>
                </div>

                @elseif($step == 3 && session('option') === 'petugas')
                <h4>Step 3: Data Petugas</h4>
                <input type="text" name="nama_petugas" class="form-control mb-3" placeholder="Nama Petugas">
                <button type="submit" class="btn btn-success btn-custom">Selesai</button>
                <div class="d-flex justify-content-between">
                    <button type="submit" name="back" class="btn btn-secondary btn-custom">Back</button>
                </div>

                @elseif($step == 4 || (session('option') === 'tempat' && $step == 3))
                <h4>Step 4: Data Tempat</h4>
                <input type="text" name="nama_tempat" class="form-control mb-3" placeholder="Nama Tempat">
                <button type="submit" class="btn btn-success btn-custom">Selesai</button>
                <div class="d-flex justify-content-between">
                    <button type="submit" name="back" class="btn btn-secondary btn-custom">Back</button>
                </div>
                @endif
            </form>

        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
