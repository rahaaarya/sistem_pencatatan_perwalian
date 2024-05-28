<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    protected $table = 'tahun';

    protected $fillable = [
        'tahun_akademik',
        'semester',
        'status',
    ];
    public function perwalian()
    {
        return $this->hasMany(Perwalian::class, 'tahun_akademik_id');
    }
}
