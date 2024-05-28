<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    use HasFactory;


    protected $table = 'krs';
    protected $fillable = ['mahasiswa_id', 'mata_kuliah', 'catatan'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
    public function perwalian()
    {
        return $this->belongsTo(Perwalian::class);
    }
}
