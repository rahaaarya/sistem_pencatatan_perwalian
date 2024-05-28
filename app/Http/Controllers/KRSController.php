<?php

namespace App\Http\Controllers;

use App\Models\CatatanPerwalian;
use App\Models\KRS;
use App\Models\Perwalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KRSController extends Controller
{
    public function index()
    {
        // Mendapatkan ID mahasiswa yang sedang login
        $mahasiswaId = Auth::id();

        // Ambil histori perwalian beserta catatannya
        $historiPerwalian = Perwalian::where('mahasiswa_id', $mahasiswaId)
            ->with(['dosen', 'catatanPerwalian'])
            ->orderBy('tanggal_perwalian', 'desc')
            ->get();

        return view('pages.mhs.catatan', compact('historiPerwalian'));
    }
    public function catatan(Request $request)
    {
        // Validasi request
        $request->validate([
            'catatan' => 'required|string',
        ]);

        // Dapatkan ID mahasiswa yang terkait dengan sesi pengguna saat ini
        $mahasiswaId = Auth::id();

        // Cari ID perwalian yang terkait dengan mahasiswa ini
        $perwalian = Perwalian::where('mahasiswa_id', $mahasiswaId)->first();

        // Jika belum ada perwalian, buat perwalian baru
        if (!$perwalian) {
            $perwalian = new Perwalian();
            $perwalian->mahasiswa_id = $mahasiswaId;
            $perwalian->save();
        }

        // Buat catatan perwalian baru
        $catatanPerwalian = new CatatanPerwalian();
        $catatanPerwalian->perwalian_id = $perwalian->id;
        $catatanPerwalian->catatan = $request->catatan;
        $catatanPerwalian->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Catatan berhasil disimpan.');
    }
}
