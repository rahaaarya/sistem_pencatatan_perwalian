<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    // Menentukan nama tabel di database
    protected $table = 'program_studi';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'kode_prodi',
        'nama_prodi',

    ];
    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class, 'program_studi');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'program_studi');
    }
}
