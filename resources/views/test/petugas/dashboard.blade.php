<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

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
                        @if ($profile['role'] == 'penjaga')
                            <a href="/test/petugas/sampah/antar" class="nav-link btn btn-outline-secondary w-100">Persetujuan Sampah</a>
                         @else
                            <a href="/test/petugas/sampah/ambil" class="nav-link btn btn-outline-secondary w-100">Ambil Sampah</a>
                         @endif
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
                            <th>Dibuat Jam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                                $no = 0 ;
                            @endphp
                            @foreach ($profile['sampahs'] as $sampah )
                            <tr>
                                <td>{{$sampah->id}}</td>
                                <td>{{$sampah->User->name}}</td>
                                <td>{{$sampah->berat}}</td>
                                <td>{{$sampah->status}}</td>
                                <td>{{$sampah->created_at->format('H:i')}}</td>
                            </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Status -->
            <div class="col-md-3 bg-light p-4">
                <h2>Status</h2>
                <form wire:submit.prevent="saveStatus">
                    <div class="mb-3">
                        <label for="status" class="form-label">Pilih Status</label>
                        <select class="form-select" id="status" wire:model="status">
                            <option value="{{$status}}">{{$status}}</option>
                            <option value="cuti">Cuti</option>
                            <option value="rest">Rest</option>
                            <option value="siaga">Siaga</option>
                        </select>
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

</div>
