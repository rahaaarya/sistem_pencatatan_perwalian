@extends('layouts.content')
@section('title', 'Tambah Mata Kuliah')

@section('content')
<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
            <h3 class="fw-bold"><i class="fas fa-book"></i> Tambah Mata Kuliah</h3>
        </div>
    </div>
    <hr>
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.matakuliah.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Mata Kuliah</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="{{ old('kode') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="sks" class="form-label">SKS</label>
                            <input type="number" class="form-control" id="sks" name="sks" value="{{ old('sks') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <input type="number" class="form-control" id="semester" name="semester" value="{{ old('semester') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="program_studi" class="form-label">Program Studi</label>
                            <input type="text" class="form-control" id="program_studi" name="program_studi" value="{{ old('program_studi') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
