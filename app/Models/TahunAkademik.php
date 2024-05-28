<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    // Menentukan nama tabel di database
    protected $table = 'tahun_akademik';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'tahun_akademik',
        'semester',
        'status',

    ];
}
