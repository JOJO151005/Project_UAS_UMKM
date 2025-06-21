<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pembina extends Model
{
    use HasFactory;

    protected $table = 'pembina';
    public $timestamps = false;

    protected $fillable = ['nama', 'gender', 'tgl_lahir', 'tmp_lahir', 'keahlian'];

    public function umkms(): HasMany
    {
        return $this->hasMany(Umkm::class);
    }
}