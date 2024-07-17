<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pelanggan';

    protected $table = 'pelanggan';
    protected $fillable = [
      'username',
      'password',
      'nomor_kwh',
        'nama_pelanggan',
        'alamat',
        'id_tarif',
    ];

    public function tarif(): BelongsTo
    {
        return $this->belongsTo(Tarif::class, 'id_tarif');
    }

    public function penggunaan_s(): HasMany
    {
        return $this->hasMany(Penggunaan::class, 'id_pelanggan');
    }

    public function tagihan_s(): HasMany
    {
        return $this->hasMany(Tagihan::class, 'id_pelanggan');
    }

    public function pembayaran_s(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'id_pelanggan');
    }
}
