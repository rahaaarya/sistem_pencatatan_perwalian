@extends('layouts.content')
@section('title', 'Edit Data Mahasiswa')

@section('content')
<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="fw-bold">Edit Data Mahasiswa</h3>
            <form action="{{ route('admin.mahasiswa.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $mahasiswa->nama }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}">
                </div>
                <div class="mb-3">
                    <label for="program_studi" class="form-label">Program Studi</label>
                    <input type="text" class="form-control" id="program_studi" name="program_studi" value="{{ $mahasiswa->program_studi }}">
                </div>
                <div class="mb-3">
                    <label for="tahun_akademik_id" class="form-label">Tahun Akademik</label>
                    <select class="form-select" name="tahun_akademik_id">
                        @foreach($tahunAkademiks as $tahunAkademik)
                            <option value="{{ $tahunAkademik->id }}" {{ $mahasiswa->tahun_akademik_id == $tahunAkademik->id ? 'selected' : '' }}>
                                {{ $tahunAkademik->tahun_akademik }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
