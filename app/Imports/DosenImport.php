<?php

namespace App\Imports;

use App\Models\Dosen;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DosenImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key === 0) {
                continue; // Skip header row
            }

            $nidn = $row[0]; // Ambil NIDN dari data impor

            // Memperbarui data yang sudah ada atau membuat data baru
            Dosen::updateOrCreate(
                ['nidn' => $nidn],
                [
                    'nama' => $row[1],
                    'email' => $row[2],

                ]
            );
        }
    }
}
