<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class Multiplesheets implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            "Mahasiswa" => new MahasiswaImport(),
            "Dosen" => new DosenImport,
        ];
    }
}
