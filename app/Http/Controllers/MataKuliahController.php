<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request; // Ubah ini
use Illuminate\Support\Facades\Validator;

class MataKuliahController extends Controller
{

    public function matakuliah(Request $request)
    {
        $keyword = $request->input('keyword');
        $mataKuliahs = MataKuliah::where('nama', 'like', "%$keyword%")->get();
        return view('pages.admin.matakuliah', compact('mataKuliahs'));
    }

    public function create()
    {
        return view('pages.admin.tambahmatkul');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required|numeric',
            'program_studi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        MataKuliah::create($request->all());
        return redirect()->route('admin.matakuliah')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        return view('pages.admin.editmatkul', compact('mataKuliah'));
    }

    public function update(Request $request, $id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required|numeric',
            'program_studi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mataKuliah->update($request->all());
        return redirect()->route('admin.matakuliah')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->delete();
        return redirect()->route('admin.matakuliah')->with('success', 'Mata kuliah berhasil dihapus.');
    }

    // Mahasiswa
    public function catat()
    {
        // Mengambil semua data dari tabel mata_kuliah
        $mataKuliahs = MataKuliah::all(); // Menggunakan nama variabel yang tepat

        // Mengirim data ke tampilan 'pages.mhs.krs' 
        return view('pages.mhs.krs', compact('mataKuliahs')); // Pastikan nama variabel sesuai
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword'); // Perhatikan bahwa ini adalah 'search', sesuai dengan atribut 'name' di dalam input

        // Ambil data mata kuliah dengan filter pencarian berdasarkan semester
        $mataKuliah = MataKuliah::where('semester', 'like', "%$keyword%")->get();

        // Kemudian kirim data ke tampilan
        return view('pages.mhs.krs', compact('mataKuliah'));
    }
}
