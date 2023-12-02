<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumberagung extends Model
{
    use HasFactory;
    protected $table = 'sumberagung';
    protected $fillable = [
        'id',
        'blok',
        'sppt',
        'pbt',
        'no_berkas',
        'nib',
        'luas_ukur',
        'beda_luas',
        'selisih',

        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'agama',
        'pekerjaan',

        'rt',
        'rw',
        'dusun',
        'no_c',
        'persil',
        'klas',
        'status_penggunaan',
        'luas_permohonan',
        'batas_utara',
        'batas_timur',
        'batas_selatan',
        'batas_barat',

        'tahun_1',
        'nama_1',
        'tahun_2',
        'nama_2',
        'sebab_2',
        'dasar_2',
        'tahun_3',
        'sebab_3',
        'dasar_3',

        'nik_saksi_1',
        'tanggal_pendataan',
        'no_hp',
    ];
//    protected $guarded = [];
    public $timestamps = false;

}
