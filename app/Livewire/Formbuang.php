<?php
namespace App\Livewire;

use App\Models\sampah;
use Auth;
use DB;
use Livewire\Component;

class Formbuang extends Component
{
    public $currentStep = 1; // Step aktif
    public $formData = [
        'berat' => '',
        'metode' => '',
        'id_petugas' => null,
        'id_tempat_pembuangan' => null,
        'id_jadwal' => null,
        'status'=>'menunggu'
    ];

    public $dataPetugas;
    public $dataTempatPembuangan;

    public function render()
    {
        $kecamatan = Auth::user()->id_kecamatan;

        $this->dataPetugas = DB::table('users')
            ->select('users.id', 'name')
            ->join('petugas', 'users.id', '=', 'petugas.id_user')
            ->where('id_kecamatan', '=', $kecamatan)
            ->where('users.role', '=', 'petugas')
            ->get();

        $this->dataTempatPembuangan = DB::table('tempat_pembuangans')
            ->select('id', 'nama')
            ->where('id_kecamatan', '=', $kecamatan)
            ->get();

        return view('livewire.formbuang');
    }

    public function nextStep()
    {
        if ($this->currentStep < 2) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submit()
    {
     //   dd(vars: $this->formData);


        // $this->validate([
        //     'formData.berat' => 'required|numeric|min:1',
        //     'formData.metode' => 'required|in:antar,ambil',
        //     'formData.id_petugas' => 'required_if:formData.metode,ambil',
        //     'formData.id_TempatPembuangan' => 'required_if:formData.metode,antar',
        // ]);

        // Simpan data ke database (contoh)

        if ($this->formData['metode'] == 'antar'){
            $this->formData['status'] = 'pending';
        }

        DB::table('sampahs')->insert([
            'id_pengguna' => Auth::user()->id,
            'id_petugas'  => $this->formData['id_petugas'],
            'id_tempat_pembuangan'  => $this->formData['id_tempat_pembuangan'],
            'id_jadwal'  => $this->formData['id_jadwal'],
            'metode'  => $this->formData['metode'],
            'status'  => $this->formData['status'],
            'berat'  => $this->formData['berat'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        return redirect()->route('user.dashboard');
    }
}
