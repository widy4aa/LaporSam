<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username', 'name', 'alamat_lengkap', 'kecamatan', 'link_gambar', 'point', 'role', 'lat', 'longt', 'id_kecamatan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $table = 'users';

    // Relasi ke kecamatan
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(kecamatan::class, 'id_kecamatan');
    }

    // Relasi ke petugas
    public function petugas(): HasMany
    {
        return $this->hasMany(Petugas::class, 'id_user');
    }

    // Relasi ke sampah
    public function sampahs(): HasMany
    {
        return $this->hasMany(Sampah::class, 'id_pengguna');
    }
}
