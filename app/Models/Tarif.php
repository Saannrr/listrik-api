<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tarif extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tarif';

    protected $table = 'tarif';
    protected $fillable = [
      'daya',
      'tarifperkwh',
    ];

    public function pelanggan_s(): HasMany
    {
        return $this->hasMany(Pelanggan::class, 'id_tarif');
    }
}
