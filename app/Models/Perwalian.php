<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perwalian extends Model
{
    protected $table = 'perwalian';
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'program_studi',
        'dosen_id',
        'tahun_akademik_id',
        'tanggal_perwalian',
        'mahasiswa_id'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi', 'id');
    }

    public function tahunAkademik()
    {
        return $this->belongsTo(Tahun::class, 'tahun_akademik_id');
    }
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah');
    }
    public function krs()
    {
        return $this->hasMany(KRS::class, 'perwalian_id');
    }
    public function catatanPerwalian()
    {
        return $this->hasMany(CatatanPerwalian::class);
    }
}
