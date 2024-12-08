<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 bg-light vh-100 p-3">
            <h4 class="mb-4">Text</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link btn btn-outline-secondary w-100">HOME PAGE</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link btn btn-outline-secondary w-100">Persetujuan Sampah</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link btn btn-outline-secondary w-100">Ambil Sampah</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link btn btn-outline-secondary w-100">Leaderboard</a>
                </li>
            </ul>
        </div>

        <!-- Tabel -->
        <div class="col-md-6 bg-warning p-4">
            <h2 class="mb-4">Sampah Mu</h2>
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembuang</th>
                        <th>Berat</th>
                        <th>Status</th>
                        <th>Dibuat Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ahmad</td>
                        <td>2 Kg</td>
                        <td>Diproses</td>
                        <td>10:00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Status -->
        <div class="col-md-3 bg-light p-4">
            <h2>Status</h2>
            <form wire:submit.prevent="saveStatus">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status" id="statusCuti" wire:model="status" value="Cuti">
                    <label class="form-check-label" for="statusCuti">Cuti</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status" id="statusRest" wire:model="status" value="Rest">
                    <label class="form-check-label" for="statusRest">Rest</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status" id="statusSiaga" wire:model="status" value="Siaga">
                    <label class="form-check-label" for="statusSiaga">Siaga</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Save</button>
            </form>

            @if (session()->has('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger mt-3">{{ session('error') }}</div>
            @endif
        </div>
    </div>
</div>
