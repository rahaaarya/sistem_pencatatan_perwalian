<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanPerwalian extends Model
{
    protected $table = 'catatan_perwalian';

    protected $fillable = [
        'perwalian_id',
        'catatan',
        'balasan_dosen',
    ];

    public function perwalian()
    {
        return $this->belongsTo(Perwalian::class);
    }
}
