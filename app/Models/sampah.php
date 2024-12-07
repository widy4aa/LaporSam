<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class sampah extends Model
{
    //
    protected $guarded = [];

        // Relasi ke User (Pengguna)
        public function pengguna(): BelongsTo
        {
            return $this->belongsTo(User::class, 'id_pengguna');
        }

        // Relasi ke Petugas
        public function petugas(): BelongsTo
        {
            return $this->belongsTo(petugas::class, 'id_petugas');
        }

        // Relasi ke Tempat Pembuangan
        public function tempatPembuangan(): BelongsTo
        {
            return $this->belongsTo(tempat_pembuangan::class, 'id_tempat_pembuangan');
        }

        // Relasi ke Jadwal
        public function jadwal(): BelongsTo
        {
            return $this->belongsTo(jadwal::class, 'id_jadwal');
        }
}
