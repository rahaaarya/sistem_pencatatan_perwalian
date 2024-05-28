<?php

namespace App\Http\Controllers;

use App\Imports\Multiplesheets;
use App\Imports\UsersImport;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Perwalian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ViewErrorBag;
use Maatwebsite\Excel\Facades\Excel;

class DosenController extends Controller
{
    public function index()
    {
        // Pastikan hanya user dengan role dosen yang dapat mengakses halaman ini
        if (Auth::user()->role !== 'dosen') {
            abort(403); // Unauthorized
        }

        // Load view halaman dosen
        return view('pages.dosen.dosen');
    }

    public function dosen(Request $request)
    {
        $keyword = $request->input('keyword');

        // Ambil data dosen dari model Dosen dengan filter pencarian
        $dosens = Dosen::where('nama', 'like', "%$keyword%")
            ->orWhere('nidn', 'like', "%$keyword%")
            ->orWhere('email', 'like', "%$keyword%")
            ->get();

        // Load view halaman manajemen dosen dengan data hasil pencarian
        return view('pages.admin.dosen', compact('dosens'));
    }

    public function tambahdosen()
    {
        return view('pages.admin.tambahdosen');
    }

    public function kirimdosen(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nidn' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
        ]);

        // Simpan data dosen ke dalam database
        Dosen::create([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        // Redirect ke halaman yang sesuai setelah menyimpan data
        return redirect()->route('admin.dosen')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function editdosen($id)
    {
        $dosen = Dosen::findOrFail($id);

        // Load view untuk form edit dengan data dosen yang akan diubah
        return view('pages.admin.editdosen', compact('dosen'));
    }

    public function updatedosen(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        // Validasi data yang diinputkan
        $validator = Validator::make($request->all(), [
            'nidn' => 'required|unique:dosen,nidn,' . $id,
            'nama' => 'required|unique:dosen,nama,' . $id,
            'email' => 'required|email',
        ], [
            'nidn.required' => 'NIDN wajib diisi.',
            'nidn.unique' => 'NIDN sudah ada.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.unique' => 'Nama sudah ada.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update data dosen
        $dosen->nidn = $request->nidn;
        $dosen->nama = $request->nama;
        $dosen->email = $request->email;
        $dosen->save();

        // Redirect kembali ke halaman manajemen dosen dengan pesan sukses
        return redirect()->route('admin.dosen')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function hapusdosen($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return redirect()->route('admin.dosen')->with('success', 'Data dosen berhasil dihapus');
    }

    public function showProfile($id)
    {
        // Cari data dosen berdasarkan ID
        $dosen = Dosen::findOrFail($id);

        // Load view halaman profil dosen
        return view('pages.admin.profil-dosen', compact('dosen'));
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

    public function historiPerwalian()
    {
        // Mendapatkan ID dosen yang sedang login
        $dosenId = Auth::user()->dosen_id;

        // Ambil histori perwalian beserta catatan terbaru per mahasiswa
        $historiPerwalian = Perwalian::where('dosen_id', $dosenId)
            ->with(['mahasiswa', 'catatanPerwalian' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->get()
            ->groupBy('mahasiswa_id')
            ->map(function ($group) {
                // Ambil catatan terbaru per mahasiswa
                $perwalian = $group->first();
                $perwalian->catatanTerbaru = $perwalian->catatanPerwalian->first();
                return $perwalian;
            })
            ->sortByDesc(function ($perwalian) {
                return $perwalian->catatanTerbaru->created_at;
            });

        // Kembalikan view dengan data histori perwalian
        return view('pages.dosen.histori-perwalian', compact('historiPerwalian'));
    }
}
