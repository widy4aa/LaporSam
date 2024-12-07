<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div>
        <h2>Okei Buang Sampah</h2>

        {{-- Step 1 --}}
        @if ($currentStep == 1)
            <div>
                <label for="berat">Berat Sampah</label>
                <input type="number" id="berat" wire:model="formData.berat" min="1" required>
            </div>

            <div>
                <label for="metode">Pilih Opsi</label>
                <select id="metode" wire:model="formData.metode" required>
                    <option value="">-- Pilih Opsi --</option>
                    <option value="antar">Antar</option>
                    <option value="ambil">Ambil</option>
                </select>
            </div>

            <div>
                <button type="button" wire:click="nextStep">Next</button>
            </div>
        @endif

        {{-- Step 2 --}}
        @if ($currentStep == 2)
            @if ($formData['metode'] == 'ambil')
                <div>
                    <label for="id_petugas">Petugas</label>
                    <select name="id_petugas" id="id_petugas" wire:model="formData.id_petugas" required>
                        <option value="">-- Pilih Petugas --</option>
                        @foreach ($dataPetugas as $petugas)
                            <option value="{{ $petugas->id }}">{{ $petugas->name }}</option>
                        @endforeach
                    </select>
                </div>
            @elseif ($formData['metode'] == 'antar')
                <div>
                    <label for="id_TempatPembuangan">Tempat Pembuangan</label>
                    <select name="id_TempatPembuangan" id="id_TempatPembuangan" wire:model="formData.id_tempat_pembuangan" required>
                        <option value="">-- Pilih Tempat Pembuangan --</option>
                        @foreach ($dataTempatPembuangan as $tempatPembuangan)
                            <option value="{{ $tempatPembuangan->id }}">{{ $tempatPembuangan->nama }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <div>
                    <p>Metode belum dipilih. Silakan kembali dan pilih metode.</p>
                </div>
            @endif

            <div>
                <button type="button" wire:click="previousStep">Back</button>
                <button type="button" wire:click="submit">Submit</button>
            </div>
        @endif

        {{-- Success Message --}}
        @if (session()->has('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
