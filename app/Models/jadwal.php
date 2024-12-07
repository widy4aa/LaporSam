<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class jadwal extends Model
{
    //
    protected $guarded = [];
    protected $table = 'jadwals';

    // Relasi ke JadwalPetugas
    public function jadwalPetugas(): HasMany
    {
        return $this->hasMany(jadwal_petugas::class, 'id_jadwal');
    }
}
