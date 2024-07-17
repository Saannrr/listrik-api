<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_level';

    protected $table = 'levels';
    protected $fillable = [
      'nama_level'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id_level');
    }
}
