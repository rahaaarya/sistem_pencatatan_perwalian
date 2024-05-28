<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\Tahun;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MahasiswaImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key === 0) {
                continue; // Skip header row
            }

            $nim = $row[0]; // Ambil NIM dari data impor

            $tahun_akademik = $row[4]; // Ambil tahun akademik dari data impor
            $tahun_akademik_id = Tahun::where('tahun_akademik', $tahun_akademik)->value('id');

            // Memperbarui data yang sudah ada atau membuat data baru
            Mahasiswa::updateOrCreate(
                ['nim' => $nim],
                [
                    'nama' => $row[1],
                    'email' => $row[2],
                    'program_studi' => $row[3],
                    'tahun_akademik_id' => $tahun_akademik_id,
                ]
            );
        }
    }
}
