<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriUmkm extends Model
{
    use HasFactory;

    protected $table = 'kategori_umkm';
    public $timestamps = false;

    protected $fillable = ['nama'];

    public function umkms(): HasMany
    {
        return $this->hasMany(Umkm::class);
    }
}