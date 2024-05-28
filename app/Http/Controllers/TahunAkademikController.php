<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAkademik; // Import model TahunAkademik

class TahunAkademikController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $tahunakademiks = TahunAkademik::where('tahun_akademik', 'like', "%$keyword%")->get();
        return view('pages.admin.thn-akademik', compact('tahunakademiks'));
    }
    public function tambah()
    {
        // Tampilkan halaman tambah tahun akademik
        return view('pages.admin.tambahthn');
    }
    public function simpan(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'tahun_akademik' => 'required',
            'semester' => 'required',
            'status' => 'required',
        ]);

        // Buat objek TahunAkademik baru dan isi dengan data dari form
        $tahunAkademik = new TahunAkademik();
        $tahunAkademik->tahun_akademik = $request->tahun_akademik;
        $tahunAkademik->semester = $request->semester;
        $tahunAkademik->status = $request->status;

        // Simpan data ke database
        $tahunAkademik->save();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('admin.thn-akademik')->with('success', 'Data tahun akademik berhasil disimpan.');
    }
    public function edit($id)
    {
        $tahunakademik = TahunAkademik::findOrFail($id);
        return view('pages.admin.editthn', compact('tahunakademik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_akademik' => 'required',
            'semester' => 'required',
            'status' => 'required',
        ]);

        $tahunakademik = TahunAkademik::findOrFail($id);
        $tahunakademik->tahun_akademik = $request->tahun_akademik;
        $tahunakademik->semester = $request->semester;
        $tahunakademik->status = $request->status;
        $tahunakademik->save();

        return redirect()->route('admin.thn-akademik')->with('success', 'Data tahun akademik berhasil diperbarui.');
    }
    public function delete($id)
    {
        $tahunakademik = TahunAkademik::findOrFail($id);
        $tahunakademik->delete();

        return redirect()->route('admin.thn-akademik')->with('success', 'Data tahun akademik berhasil dihapus.');
    }
}
