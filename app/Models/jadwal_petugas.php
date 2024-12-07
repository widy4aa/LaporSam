<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class jadwal_petugas extends Model
{
    //
    protected $guarded = [];

    protected $table = 'jadwal_petugas';

    // Relasi ke Jadwal
    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(jadwal::class, 'id_jadwal');
    }

    // Relasi ke Petugas
    public function petugas(): BelongsTo
    {
        return $this->belongsTo(petugas::class, 'id_petugas');
    }
}
