<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'program_studi',
        'tahun_akademik_id',
    ];


    // Mendefinisikan relasi dengan model Tahun
    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'tahun_akademik_id');
    }
    public function perwalian()
    {
        // return $this->hasMany(Perwalian::class, 'nim', 'nama_mahasiswa', 'program_studi');
        return $this->hasMany(Perwalian::class, 'nim', 'nim');
    }
    public function dosens()
    {
        return $this->belongsToMany(Dosen::class, '');
    }
    public function krs()
    {
        return $this->hasMany(KRS::class, 'mahasiswa_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'mahasiswa_id');
    }
}
