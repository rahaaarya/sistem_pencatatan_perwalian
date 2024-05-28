<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Perwalian;
use Illuminate\Http\Request;

class RekapPerwalianController extends Controller
{
    public function index()
    {
        $perwalians = Perwalian::all();
        return view('pages.admin.rekap-perwalian', compact('perwalians'));
    }
    public function tambah()
    {
        $mahasiswa = Mahasiswa::all();
        $dosens = Dosen::all();
        $mataKuliahs = MataKuliah::all();
        // Pastikan untuk mengganti 'Dosen' dengan model yang sesuai
        // Logika untuk mendapatkan data yang diperlukan, seperti daftar mahasiswa dan dosen
        return view('pages.admin.tambah-perwalian', compact('mahasiswa', 'dosens', 'mataKuliahs'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nim' => 'required',
            'dosen_id' => 'required',
            'mata_kuliah_id' => 'required',
            'tahun_akademik' => 'required',
            'tanggal_perwalian' => 'required',
        ]);

        // Simpan data perwalian baru
        Perwalian::create([
            'nim' => $request->nim,
            'dosen_id' => $request->dosen_id,
            'mata_kuliah_id' => $request->mata_kuliah,
            'tahun_akademik' => $request->tahun_akademik,
            'tanggal_perwalian' => $request->tanggal_perwalian,
        ]);

        // Redirect ke halaman rekap perwalian
        return redirect()->route('admin.rekap-perwalian')->with('success', 'Data perwalian berhasil disimpan.');
    }
    public function edit($id)
    {
        // Logika untuk mendapatkan data perwalian berdasarkan ID dan data yang diperlukan untuk form edit
        $perwalian = Perwalian::findOrFail($id);
        return view('pages.edit-perwalian', compact('perwalian'));
    }
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nim' => 'required',
            'dosen_id' => 'required',
            'mata_kuliah_id' => 'required',
            'tahun_akademik' => 'required',
            'tanggal_perwalian' => 'required|date',
        ]);

        // Temukan data perwalian berdasarkan ID
        $perwalian = Perwalian::findOrFail($id);

        // Update data perwalian
        $perwalian->update([
            'nim' => $request->nim,
            'dosen_id' => $request->dosen_id,
            'mata_kuliah_id' => $request->mata_kuliah,
            'tahun_akademik' => $request->tahun_akademik,
            'tanggal_perwalian' => $request->tanggal_perwalian,
        ]);

        // Redirect ke halaman rekap perwalian
        return redirect()->route('admin.rekap-perwalian')->with('success', 'Data perwalian berhasil diperbarui.');
    }
    public function destroy($id)
    {
        // Temukan data perwalian berdasarkan ID
        $perwalian = Perwalian::findOrFail($id);

        // Hapus data perwalian
        $perwalian->delete();

        // Redirect ke halaman rekap perwalian
        return redirect()->route('admin.rekap-perwalian')->with('success', 'Data perwalian berhasil dihapus.');
    }
    public function getMahasiswaByNim($nim)
    {
        // Ambil data mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        // Mengembalikan respons dalam format JSON
        return response()->json([
            'nama' => $mahasiswa ? $mahasiswa->nama : '', // Jika data mahasiswa ditemukan, kirim nama, jika tidak, kirim string kosong
        ]);
    }
}
