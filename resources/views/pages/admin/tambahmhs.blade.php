@extends('layouts.content')
@section('title', 'Tambah Data Mahasiswa')

@section('content')
<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
           <h3 class="fw-bold"><i class="bi bi-person-fill-add"></i> Tambah Data Mahasiswa</h3>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center mt-5">
        <div class="card card-rounded" style="width: 80%;">
            <div class="card-body">
                <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="Masukkan NIM">
                        @error('nim')
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama">
                        @error('nama')
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email">
                        @error('email')
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="program_studi" class="form-label">Program Studi</label>
                        <input type="text" class="form-control @error('program_studi') is-invalid @enderror" id="program_studi" name="program_studi" placeholder="Masukkan Program Studi">
                        @error('program_studi')
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tahun_akademik_id" class="form-label">Tahun Akademik</label>
                        <select class="form-select" id="tahun_akademik_id" name="tahun_akademik_id">
                            <option selected disabled>Pilih Tahun Akademik</option>
                            @foreach($tahunAkademiks as $tahunAkademik)
                                <option value="{{ $tahunAkademik->id }}">{{ $tahunAkademik->tahun_akademik }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
