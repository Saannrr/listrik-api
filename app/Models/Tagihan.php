<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tagihan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tagihan';

    protected $table = 'tagihan';
    protected $fillable = [
      'id_penggunaan',
      'id_pelanggan',
      'bulan',
      'tahun',
      'jumlah_meter',
      'status',
    ];

    public function penggunaan(): BelongsTo
    {
        return $this->belongsTo(Penggunaan::class, 'id_penggunaan');
    }

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function pembayaran_s(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'id_tagihan');
    }
}
