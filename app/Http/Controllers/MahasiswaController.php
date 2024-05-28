<?php

namespace App\Http\Controllers;

use App\Imports\Multiplesheets;
use App\Imports\UsersImport;
use App\Models\KRS;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Perwalian;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Pastikan hanya user dengan role mahasiswa yang dapat mengakses halaman ini
        if (Auth::user()->role !== 'mahasiswa') {
            abort(403); // Unauthorized
        }

        // Ambil semua data mahasiswa
        $mahasiswa = Mahasiswa::all();
        $tahunAkademiks = Tahun::all();
        return view('pages.mhs.mahasiswa', compact('mahasiswa', 'tahunAkademiks'));
    }
    public function mahasiswa(Request $request)
    {
        $keyword = $request->input('keyword');

        // Ambil data dosen dari model Dosen dengan filter pencarian
        $mahasiswa = Mahasiswa::where('nama', 'like', "%$keyword%")
            ->orWhere('nim', 'like', "%$keyword%")
            ->orWhere('email', 'like', "%$keyword%")
            ->orWhere('program_studi', 'like', "%$keyword%")
            ->get();
        $tahunAkademiks = Tahun::all();
        // Load view halaman manajemen dosen dengan data hasil pencarian
        return view('pages.admin.mahasiswa', compact('mahasiswa', 'tahunAkademiks'));
    }
    public function create()
    {
        $tahunAkademiks = Tahun::all(); // Ambil semua tahun akademik untuk dropdown
        return view('pages.admin.tambahmhs', compact('tahunAkademiks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'email' => 'required|email|unique:mahasiswa',
            'program_studi' => 'required',
            'tahun_akademik_id' => 'required' // Pastikan validasi untuk tahun_akademik_id
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'program_studi' => $request->program_studi,
            'tahun_akademik_id' => $request->tahun_akademik_id // Simpan tahun akademik id
        ]);

        return redirect()->route('admin.mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $tahunAkademiks = Tahun::all(); // Ambil semua tahun akademik untuk dropdown
        return view('pages.admin.editmhs', compact('mahasiswa', 'tahunAkademiks'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'email' => 'required|email|unique:mahasiswa,email,' . $mahasiswa->id,
            'program_studi' => 'required',
            'tahun_akademik_id' => 'required' // Pastikan validasi untuk tahun_akademik_id
        ]);

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'program_studi' => $request->program_studi,
            'tahun_akademik_id' => $request->tahun_akademik_id // Update tahun akademik id
        ]);

        return redirect()->route('admin.mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('admin.mahasiswa')->with('success', 'Data Mahasiswa  berhasil dihapus.');
    }
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('pages.admin.profilmhs', compact('mahasiswa'));
    }
    public function import(Request $request)
    {
        return view('pages.admin.dosen');
    }
    public function import_proses(Request $request)
    {
        if ($request->hasFile('excel_file')) {
            $file = $request->file('excel_file');
            Excel::import(new Multiplesheets, $file); // Sesuaikan dengan nama kelas import Anda
            return redirect()->back()->with('success', 'File Excel berhasil diimpor.');
        }
        return redirect()->back()->with('error', 'File Excel tidak ditemukan.');
    }
    // Method untuk mengambil data mahasiswa berdasarkan NIM dan mengembalikan respons dalam format JSON
    public function getMahasiswaByNim($nim)
    {
        // Cari mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        // Jika mahasiswa tidak ditemukan, kirim respons 404 (Not Found)
        if (!$mahasiswa) {
            return response()->json(['error' => 'Mahasiswa tidak ditemukan'], 404);
        }

        // Jika mahasiswa ditemukan, kirim respons dengan data mahasiswa dalam format JSON
        return response()->json([
            'nama' => $mahasiswa->nama,
            'program_studi' => $mahasiswa->program_studi,
        ]);
    }

    // Mahasiswa
    public function catatPerwalian()
    {
        $mahasiswaId = Auth::user()->id;
        $krs = KRS::where('mahasiswa_id', $mahasiswaId)->first();
        $mataKuliah = [];
        $totalSKS = 0;

        if ($krs) {
            $selectedMataKuliahIds = json_decode($krs->mata_kuliah);
            $mataKuliahList = MataKuliah::whereIn('id', $selectedMataKuliahIds)->get();

            foreach ($mataKuliahList as $mk) {
                $totalSKS += $mk->sks;
                if ($totalSKS <= 24) { // batas maksimum SKS (ubah sesuai kebutuhan)
                    $mataKuliah[] = $mk;
                } else {
                    break;
                }
            }
        }

        return view('pages.mhs.catat-perwalian', compact('mataKuliah'));
    }

    public function krs()
    {
        return View::make('pages.mhs.krs');
    }

    public function simpanCatatanPerwalian(Request $request)
    {
        // Ambil ID mahasiswa dari pengguna yang terautentikasi
        $mahasiswaId = Auth::user()->id;

        // Ambil ID perwalian terakhir yang dimasukkan ke dalam database
        $perwalianId = Perwalian::latest('id')->value('id');

        $request->validate([
            'selectedMataKuliah' => 'required|array',
            'selectedMataKuliah.*' => 'exists:mata_kuliah,id', // Pastikan nilai ini ada di tabel mata_kuliah
            // 'catatan' => 'required|string' // Sesuaikan dengan kebutuhan validasi Anda
        ]);

        // Simpan data KRS ke dalam database, termasuk perwalian_id yang diambil secara otomatis
        $krs = new KRS([
            'mahasiswa_id' => $mahasiswaId,
            'mata_kuliah' => json_encode($request->input('selectedMataKuliah')),
            // 'catatan' => $request->input('catatan')
        ]);
        $krs->perwalian_id = $perwalianId;
        $krs->save();

        // Arahkan kembali ke halaman catat-perwalian dengan pesan sukses
        return redirect()->route('mhs.catat-perwalian')->with('success', 'Catatan Perwalian berhasil disimpan.');
    }

    public function exportToPdf()
    {
        $mahasiswaId = Auth::user()->id;
        $krs = KRS::where('mahasiswa_id', $mahasiswaId)->first();

        if ($krs) {
            $selectedMataKuliahIds = json_decode($krs->mata_kuliah);
            $mataKuliah = MataKuliah::whereIn('id', $selectedMataKuliahIds)->get();
            $totalSKS = $mataKuliah->sum('sks');
        } else {
            $mataKuliah = collect([]);
            $totalSKS = 0;
        }

        $pdf = FacadePdf::loadView('pages.mhs.catat-perwalian-pdf', [
            'mataKuliah' => $mataKuliah,
            'totalSKS' => $totalSKS,
        ]);

        return $pdf->download('catat-perwalian.pdf');
    }

    public function catatan()
    {
        return view('pages.mhs.catatan');
    }
}
