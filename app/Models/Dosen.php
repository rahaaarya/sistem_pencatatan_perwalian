<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = [
        'nidn',
        'nama',
        'email',
    ];
    public function perwalian()
    {
        return $this->hasMany(Perwalian::class, 'dosen_id');
    }
}
