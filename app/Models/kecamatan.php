<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kecamatan extends Model
{
    //
    protected $guarded = [];
    protected $table = 'kecamatans';

    // Relasi ke User
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id_kecamatan');
    }

    // Relasi ke Tempat Pembuangan
    public function tempatPembuangans(): HasMany
    {
        return $this->hasMany(tempat_pembuangan::class, 'id_kecamatan');
    }

}
