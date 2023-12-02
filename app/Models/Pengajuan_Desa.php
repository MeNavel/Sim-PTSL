<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan_Desa extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_desa';
    protected $fillable = [
        'id',
        'desa',
        'dusun'
    ];
}
