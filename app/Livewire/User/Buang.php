<?php

namespace App\Livewire\User;

use App\Models\petugas;
use App\Models\sampah;
use App\Models\tempat_pembuangan;
use App\Models\User;
use Auth;
use DB;
use Livewire\Component;

class Buang extends Component
{
    public $selectedTempat = null;

    public $dataPetugasAmbil;
    public $step = 1;
    public $formData = [
        'berat' => '',
        'metode' => '',
        'id_petugas' => '',
        'id_tempat_pembuangan' => '',
    ];

    public $tempat_pembuangans ;

    public function mount(){
        $kecamatanUser=Auth::user()->id_kecamatan;
        $this->dataPetugasAmbil = User::with(
            'petugas',
            'petugas.tempat_pembuangan',
        )
        ->where('id_kecamatan', $kecamatanUser)
        ->where('role', 'petugas')
        ->whereHas('petugas', function ($query) {
            $query->where('role', 'lapangan');
        })
        ->whereHas('petugas', function ($query) {
            $query->where('status', 'siaga');
        })
        ->get();

        $status = 'siaga';
        $role = 'penjaga';

        $tempat_pembuangans = tempat_pembuangan::withCount(['petugas as jumlah_penjaga' => function ($query) use ($role, $status) {
            $query->where('role', $role)->where('status', $status);
            }])
            ->whereHas('petugas', function ($query) use ($role, $status) {
                $query->where('role', $role)->where('status', $status);
            })
            ->get();
        $this->tempat_pembuangans = $tempat_pembuangans;





    }
    public function nextStep()
    {
        $this->validate([
            'formData.berat' => 'required|numeric|min:1',  // Ensuring 'berat' is numeric and at least 1
            'formData.metode' => 'required',  // Ensuring 'metode' is selected
        ]);

        $this->step = 2;

    }

    public function previousStep()
    {
        $this->step = 1;
    }


    public function cancel()
    {
        $this->reset('formData');
        $this->step = 1;
    }

    public function pilihPetugas($id){
        $dataPetugas = petugas::where('id',$id)->first();

        sampah::create([
            'id_pengguna' => Auth::user()->id,
            'id_petugas' => $dataPetugas->id,
            'id_tempat_pembuangan' => $dataPetugas->id_tempat_pembuangan,
            'metode' => 'ambil',
            'status' => 'menunggu',
            'berat' => $this->formData['berat']
        ]);

        return redirect()->route('user.dashboard');

    }

    public function pilihTempat($id){
        $dataTempat = tempat_pembuangan::where('id',$id)->first();

        sampah::create([
            'id_pengguna' => Auth::user()->id,
            'id_petugas' => null,
            'id_tempat_pembuangan' => $dataTempat->id,
            'metode' => 'antar',
            'status' => 'pending',
            'berat' => $this->formData['berat']
        ]);

        return redirect()->route('user.dashboard');

    }
    public function render()
    {
        return view('livewire.user.buang');
    }
}
