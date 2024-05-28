<?php

namespace App\Imports;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    public function model(array $row)
    {
        // Periksa apakah baris merupakan header
        if ($this->isHeader($row)) {
            return null; // abaikan baris header
        }

        // Buat aturan validasi
        $rules = [
            'nidn' => 'required|unique:dosen', // pastikan nidn tidak kosong dan unik
        ];

        // Buat data untuk validasi
        $data = [
            'nidn' => $row[0], // Mengambil NIDN dari kolom pertama
            'nama' => $row[1], // Mengambil nama dari kolom kedua
            'email' => $row[2],
            // Sesuaikan dengan struktur file Excel Anda
        ];

        // Validasi data
        $validator = validator()->make($data, $rules);

        // Jika validasi gagal, kembalikan null
        if ($validator->fails()) {
            return null;
        }

        // Jika validasi berhasil, buat instance Dosen dan kembalikan
        return new Dosen($data);
    }

    private function isHeader(array $row)
    {
        // Tentukan kriteria untuk mendeteksi baris header, misalnya jika nilai kolom kedua adalah 'NIDN'
        return $row[0] === 'NIDN';
    }
}
