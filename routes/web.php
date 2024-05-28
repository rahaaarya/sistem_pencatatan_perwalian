<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PerwalianController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TahunController;
use App\Models\Perwalian;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/', [SessionController::class, 'login']);
    Route::post('/register', [SessionController::class, 'register']);
    Route::get('/register', [SessionController::class, 'showRegistrationForm'])->name('register');
});
Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/dosen', [DosenController::class, 'index']);
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

    // Admin
    Route::get('/admin/admin', [AdminController::class, 'index'])->name('admin.admin');
    Route::get('/admin/program-studi', [ProgramStudiController::class, 'index'])->name('admin.program-studi');
    Route::get('/admin/tambahprodi', [ProgramStudiController::class, 'tambahprodi'])->name('admin.tambahprodi');
    Route::post('/admin/kirimprodi', [ProgramStudiController::class, 'kirimprodi'])->name('admin.kirimprodi');
    Route::get('/admin/editprodi/{id}', [ProgramStudiController::class, 'editprodi'])->name('admin.editprodi');
    Route::delete('/admin/hapusprodi/{id}', [ProgramStudiController::class, 'hapusprodi'])->name('admin.hapusprodi');
    Route::put('/admin/updateprodi/{id}', [ProgramStudiController::class, 'updateprodi'])->name('admin.updateprodi');
    Route::get('/admin/dosen', [DosenController::class, 'dosen'])->name('admin.dosen');
    Route::get('/admin/tambahdosen', [DosenController::class, 'tambahdosen'])->name('admin.tambahdosen');
    Route::post('/admin/tambahdosen', [DosenController::class, 'kirimdosen'])->name('admin.kirimdosen');
    Route::get('/admin/editdosen/{id}', [DosenController::class, 'editdosen'])->name('admin.dosen.editdosen');
    Route::delete('/admin/hapusdosen/{id}', [DosenController::class, 'hapusdosen'])->name('admin.dosen.hapusdosen');
    Route::put('/admin/updatedosen/{id}', [DosenController::class, 'updatedosen'])->name('admin.dosen.updatedosen');
    Route::get('/admin/dosen/{id}/profile', [DosenController::class, 'showProfile'])->name('admin.dosen.profile');
    Route::get('/admin/import', [DosenController::class, 'import'])->name('admin.import');
    Route::post('/admin/import_proses', [DosenController::class, 'import_proses'])->name('admin.import_proses');
    Route::get('/admin/matakuliah', [MataKuliahController::class, 'matakuliah'])->name('admin.matakuliah');
    Route::get('/admin/tambahmatkul', [MataKuliahController::class, 'create'])->name('admin.tambahmatkul');
    Route::post('/admin/matakuliah', [MataKuliahController::class, 'store'])->name('admin.matakuliah.store');
    Route::get('/admin/editmatkul/{id}', [MataKuliahController::class, 'edit'])->name('admin.editmatkul');
    Route::put('/admin/matakuliah/{matakuliah}', [MataKuliahController::class, 'update'])->name('admin.matakuliah.update');
    Route::delete('/admin/destroy{id}', [MataKuliahController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/mahasiswa', [MahasiswaController::class, 'mahasiswa'])->name('admin.mahasiswa');
    Route::get('/admin/mahasiswa/create', [MahasiswaController::class, 'create'])->name('admin.mahasiswa.create');
    Route::post('/admin/mahasiswa', [MahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
    Route::get('/admin/profilmhs/{id}', [MahasiswaController::class, 'show'])->name('admin.profilmhs.show');
    Route::get('/admin/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('admin.mahasiswa.edit');
    Route::put('/admin/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
    Route::delete('/admin/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');
    Route::get('/admin/import', [MahasiswaController::class, 'import'])->name('admin.import');
    Route::post('/admin/import_proses', [MahasiswaController::class, 'import_proses'])->name('admin.import_proses');
    Route::get('/admin/thn-akademik', [TahunController::class, 'index'])->name('admin.thn-akademik');
    Route::get('/admin/tambahthn', [TahunController::class, 'create'])->name('admin.tambahthn');
    Route::post('/admin/simpanthn', [TahunController::class, 'store'])->name('admin.simpanthn');
    Route::get('/admin/editthn/{id}', [TahunController::class, 'edit'])->name('admin.editthn');
    Route::put('/admin/editthn/{id}', [TahunController::class, 'update'])->name('admin.updatethn');
    Route::delete('/admin/hapusthn/{id}', [TahunController::class, 'destroy'])->name('admin.hapusthn');
    Route::get('/admin/perwalian', [PerwalianController::class, 'index'])->name('admin.perwalian');
    Route::get('/admin/tambahwali', [PerwalianController::class, 'create'])->name('admin.tambahwali');
    Route::post('/admin/perwalian', [PerwalianController::class, 'store'])->name('admin.simpanPerwalian');
    Route::get('/admin/editperwalian/{id}', [PerwalianController::class, 'edit'])->name('admin.editperwalian');
    Route::put('/admin/perwalian/{id}/update', [PerwalianController::class, 'update'])->name('admin.perwalian.update');
    Route::delete('/admin/perwalian/{id}/delete', [PerwalianController::class, 'destroy'])->name('admin.deleteperwalian');


    // Mahasiswa
    Route::get('/mhs/mahasiswa', [MahasiswaController::class, 'index'])->name('mhs.mahasiswa');
    Route::get('/mhs/catat-perwalian', [MahasiswaController::class, 'catatPerwalian'])->name('mhs.catat-perwalian');
    Route::get('/mhs/krs', [MahasiswaController::class, 'krs'])->name('mhs.krs');
    Route::get('/mhs/krs', [MataKuliahController::class, 'catat'])->name('mhs.krs');
    Route::get('/mhs/krs', [MataKuliahController::class, 'search'])->name('mhs.krs');
    Route::post('/mhs/simpan-catatan-perwalian', [MahasiswaController::class, 'simpanCatatanPerwalian'])->name('mhs.simpan-catatan-perwalian');
    Route::get('/mhs/catat-perwalian/export-pdf', [MahasiswaController::class, 'exportToPdf'])->name('mhs.catat-perwalian.export-pdf');
    Route::get('/mhs/catatan', [KRSController::class, 'index'])->name('mhs.catatan');
    Route::post('/mhs/catatan', [KRSController::class, 'catatan'])->name('mhs.simpanCatatan');

    // Dosen
    Route::get('/dosen/dosen', [DosenController::class, 'index'])->name('dosen.dosen');
    Route::get('/dosen/histori-perwalian', [DosenController::class, 'historiPerwalian'])->name('dosen.histori-perwalian');

    Route::get('/dosen/data-perwalian', [PerwalianController::class, 'historiPerwalian'])->name('dosen.data-perwalian');
    Route::get('/catatan/{id}', [PerwalianController::class, 'detailCatatan'])->name('dosen.detail-catatan');
    Route::post('/balas-catatan/{id}', [PerwalianController::class, 'balasCatatan'])->name('dosen.balas-catatan');
    Route::delete('/hapus-catatan/{id}', [PerwalianController::class, 'hapusCatatan'])->name('dosen.hapus-catatan');

    // Logout
    Route::get('logout', [SessionController::class, 'logout'])->name('logout');
});
