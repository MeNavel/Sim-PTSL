<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pemohon extends Model
{
    use HasFactory;
    protected $table = 'pemohon';
    protected $fillable = [
        'id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'agama',
        'pekerjaan',
        'no_hp',
    ];

    public function berkas_sidorejos(): BelongsToMany
    {
        return $this->belongsToMany(Sidorejo::class);
    }
}
