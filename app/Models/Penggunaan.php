<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penggunaan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_penggunaan';

    protected $table = 'penggunaan';
    protected $fillable = [
      'id_pelanggan',
      'bulan',
      'tahun',
      'meter_awal',
      'meter_akhir',
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function tagihan_s(): HasMany
    {
        return $this->hasMany(Tagihan::class, 'id_penggunaan');
    }
}
