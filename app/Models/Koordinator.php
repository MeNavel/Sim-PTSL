<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{
    use HasFactory;
    protected $table = 'koordinator';
    protected $fillable = [
        'id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'agama',
        'pekerjaan',
        'desa',
        'dusun',
        'jabatan',
    ];

    public $timestamps = false;
}
