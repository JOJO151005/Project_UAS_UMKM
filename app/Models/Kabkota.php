<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kabkota extends Model
{
    use HasFactory;

    protected $table = 'kabkota';
    public $timestamps = false;

    protected $fillable = ['nama', 'latitude', 'longitude', 'provinsi_id'];

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function umkms(): HasMany
    {
        return $this->hasMany(Umkm::class);
    }
}