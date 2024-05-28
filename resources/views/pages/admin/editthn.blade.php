@extends('layouts.content')
@section('title', 'Edit Tahun Akademik')

@section('content')
<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
            <h3 class="fw-bold"><i class="bi bi-journal-bookmark-fill"></i> Edit Tahun Akademik</h3>
        </div>
    </div>
    <hr>
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('admin.updatethn', $tahunAkademik->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                    <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" value="{{ $tahunAkademik->tahun_akademik }}" required>
                </div>
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <select class="form-select" id="semester" name="semester" required>
                        <option value="Ganjil" {{ $tahunAkademik->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                        <option value="Genap" {{ $tahunAkademik->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="Aktif" {{ $tahunAkademik->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Non-Aktif" {{ $tahunAkademik->status == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
