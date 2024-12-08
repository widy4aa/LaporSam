<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class petugas extends Model
{
    //
    protected $guarded = [];

    protected $table = 'petugas';

    // Relasi ke User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke Tempat Pembuangan
    public function tempat_pembuangan(): BelongsTo
    {
        return $this->belongsTo(tempat_pembuangan::class, 'id_tempat_pembuangan');
    }

    public function jadwal_petugas()
    {
        return $this->hasMany(jadwal_petugas::class, 'id_petugas', 'id');
    }
}
