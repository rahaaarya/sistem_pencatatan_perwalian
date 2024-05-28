<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function index()
    {
        $tahunAkademiks = Tahun::all();
        return view('pages.admin.thn-akademik', compact('tahunAkademiks'));
    }

    public function create()
    {
        return view('pages.admin.tambahthn');
    }

    public function store(Request $request)
    {

        $request->validate([
            'tahun_akademik' => 'required',
            'semester' => 'required',
            'status' => 'required|in:Aktif,Nonaktif', // Pastikan status hanya berisi 'Aktif' atau 'Nonaktif'
        ]);

        try {
            Tahun::create([
                'tahun_akademik' => $request->tahun_akademik,
                'semester' => $request->semester,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.thn-akademik')
                ->with('success', 'Data tahun akademik berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan saat menyimpan ke database, tangani di sini
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }



    public function edit($id)
    {
        $tahunAkademik = Tahun::findOrFail($id);
        return view('pages.admin.editthn', compact('tahunAkademik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_akademik' => 'required',
            'semester' => 'required',
            'status' => 'required',
        ]);

        $tahunAkademik = Tahun::findOrFail($id);
        $tahunAkademik->update($request->all());

        return redirect()->route('admin.thn-akademik')
            ->with('success', 'Data tahun akademik berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Tahun::findOrFail($id)->delete();
        return redirect()->route('admin.thn-akademik')
            ->with('success', 'Data tahun akademik berhasil dihapus.');
    }
}
