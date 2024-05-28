<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';
    protected $fillable = ['kode', 'nama', 'sks', 'semester', 'program_studi'];


    public function dosens()
    {
        return $this->belongsToMany(Dosen::class, 'mata_kuliah_dosen');
    }
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi');
    }
    public function krs()
    {
        return $this->belongsToMany(KRS::class);
    }
}
