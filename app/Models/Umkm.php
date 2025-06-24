<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'modal',
        'pemilik',
        'alamat',
        'website',
        'email',
        'rating',
        'Gambar',
        'kabkota_id',
        'kategori_umkm_id',
        'pembina_id',
    ];

    public function kabkota(): BelongsTo
    {
        return $this->belongsTo(Kabkota::class);
    }

    public function kategoriUmkm(): BelongsTo
    {
        return $this->belongsTo(KategoriUmkm::class);
    }

    public function pembina(): BelongsTo
    {
        return $this->belongsTo(Pembina::class);
    }
}