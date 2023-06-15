<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sidorejo extends Model
{
    use HasFactory;
    protected $table = 'sidorejo';
    protected $guarded = [];

    public function pemohons(): BelongsToMany
    {
        return $this->belongsToMany(Pemohon::class);
    }
}
