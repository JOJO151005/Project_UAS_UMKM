<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsi';
    public $timestamps = false;

    protected $fillable = ['nama', 'ibukota', 'latitude', 'longitude'];

    public function kabkotas(): HasMany
    {
        return $this->hasMany(Kabkota::class);
    }
}