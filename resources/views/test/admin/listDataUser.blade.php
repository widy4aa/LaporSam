<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Data Petugas</h1>
        <a href="/test/admin/Petugas/add">add</a>


        <!-- Search Bar -->
        <form method="GET" action=""" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name..." value="">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <!-- Sorting -->
        <form class="mb-3">
            <div class="input-group">
                <select name="sortBy" class="form-select" onchange="this.form.submit()">
                    <option value="name">Name</option>
                    <option value="created_at">Date Created</option>
                </select>
            </div>
        </form>

        <!-- Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Kecamatan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->kecamatan->kecamatan }}</td>
                        <td>
                            <a href="/test/admin/User/{{$user->id}}" class="btn btn-sm btn-primary">Detail</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No data available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
        </div>
    </div>
</body>
</html>
