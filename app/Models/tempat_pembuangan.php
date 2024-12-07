<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tempat_pembuangan extends Model
{
    //
    protected $guarded = [];
    protected $table = 'tempat_pembuangans';

    // Relasi ke Kecamatan
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(kecamatan::class, 'id_kecamatan');
    }

    // Relasi ke Petugas
    public function petugas(): HasMany

    {
        return $this->hasMany(petugas::class, 'id_tempat_pembuangan');

    }

    // Relasi ke Sampah
    public function sampahs(): HasMany
    {
        return $this->hasMany(sampah::class, 'id_tempat_pembuangan');
    }
}
