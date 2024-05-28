@extends('layouts.content')
@section('title', 'Edit Data Perwalian')

@section('content')
<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
            <h3 class="fw-bold"><i class="bi bi-pencil-square"></i> Edit Data Perwalian</h3>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center mt-5">
        <div class="card card-rounded" style="width: 80%;">
            <div class="card-body">
                <form action="{{ route('admin.perwalian.update', $perwalian->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ $perwalian->nim }}" readonly>
                        @error('nim')
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dosen_id" class="form-label">Dosen Wali</label>
                        <select class="form-control" id="dosen_id" name="dosen_id">
                            @foreach ($dosens as $dosen)
                                <option value="{{ $dosen->id }}" {{ $perwalian->dosen_id == $dosen->id ? 'selected' : '' }}>{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                        @error('dosen_id')
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tahun_akademik_id" class="form-label">Tahun Akademik</label>
                        <select class="form-control" id="tahun_akademik_id" name="tahun_akademik_id">
                            @foreach ($tahunAkademiks as $tahunAkademik)
                                <option value="{{ $tahunAkademik->id }}" {{ $perwalian->tahun_akademik_id == $tahunAkademik->id ? 'selected' : '' }}>{{ $tahunAkademik->tahun_akademik }}</option>
                            @endforeach
                        </select>
                        @error('tahun_akademik_id')
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_perwalian" class="form-label">Tanggal Perwalian</label>
                        <input type="date" class="form-control @error('tanggal_perwalian') is-invalid @enderror" id="tanggal_perwalian" name="tanggal_perwalian" value="{{ $perwalian->tanggal_perwalian }}">
                        @error('tanggal_perwalian')
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
