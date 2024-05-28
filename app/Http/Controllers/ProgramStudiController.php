<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ViewErrorBag;

class ProgramStudiController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $programStudis = ProgramStudi::where('nama_prodi', 'LIKE', "%$keyword%")
            ->orWhere('kode_prodi', 'LIKE', "%$keyword%")
            ->get();

        return view('pages.admin.program-studi', compact('programStudis'));
    }
    public function tambahprodi()
    {
        return view('pages.admin.tambahprodi');
    }
    public function kirimprodi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_prodi' => 'required|unique:program_studi,kode_prodi',
            'nama_prodi' => 'required|unique:program_studi,nama_prodi',
        ], [
            'kode_prodi.required' => 'Kode Prodi wajib diisi.',
            'nama_prodi.required' => 'Nama Prodi wajib diisi.',
            'kode_prodi.unique' => 'Kode Prodi sudah ada.',
            'nama_prodi.unique' => 'Nama Prodi sudah ada.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data ke dalam database
        $programStudi = new ProgramStudi();
        $programStudi->kode_prodi = $request->kode_prodi;
        $programStudi->nama_prodi = $request->nama_prodi;
        $programStudi->save();

        // Redirect kembali ke halaman program studi dengan pesan sukses
        return redirect()->route('admin.program-studi')->with('success', 'Data program studi berhasil ditambahkan');
    }


    public function editprodi($id)
    {
        $programStudi = ProgramStudi::findOrFail($id);

        // Retrieve the error bag from the session
        $errors = session()->get('errors', new ViewErrorBag);

        // Pass $errors variable to the view
        return view('pages.admin.editprodi', compact('programStudi', 'errors'));
    }


    public function hapusprodi($id)
    {
        $programStudi = ProgramStudi::findOrFail($id);
        $programStudi->delete();

        return redirect()->route('admin.program-studi')->with('success', 'Data program studi berhasil dihapus');
    }
    public function updateprodi(Request $request, $id)
    {
        $programStudi = ProgramStudi::findOrFail($id);

        // Validasi data yang diinputkan
        $validator = Validator::make($request->all(), [
            'kode_prodi' => 'required|unique:program_studi,kode_prodi,' . $id,
            'nama_prodi' => 'required|unique:program_studi,nama_prodi,' . $id,
        ], [
            'kode_prodi.required' => 'Kode Prodi wajib diisi.',
            'nama_prodi.required' => 'Nama Prodi wajib diisi.',
            'kode_prodi.unique' => 'Kode Prodi sudah ada.',
            'nama_prodi.unique' => 'Nama Prodi sudah ada.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update data program studi
        $programStudi->kode_prodi = $request->kode_prodi;
        $programStudi->nama_prodi = $request->nama_prodi;
        $programStudi->save();

        // Redirect kembali ke halaman program studi dengan pesan sukses
        return redirect()->route('admin.program-studi')->with('success', 'Data program studi berhasil diperbarui');
    }
}
