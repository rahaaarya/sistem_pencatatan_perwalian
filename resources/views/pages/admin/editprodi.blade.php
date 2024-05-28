@extends('layouts.content')
@section('title', 'Edit Program Studi')

@section('content')

<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
            <h3 class="fw-bold"><i class="bi bi-journal-bookmark-fill"></i>
                Edit Program Studi
            </h3>
        </div>

    </div>
    <hr>
    <div class="row d-flex justify-content-center mt-5">
        <div class="card card-rounded" style="width: 80%;">
            <div class="card-body">
                <form action="{{ route('admin.updateprodi', $programStudi->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kode_prodi" class="form-label">Kode Program Studi</label>
                        <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" value="{{ $programStudi->kode_prodi }}" placeholder="Masukkan Kode Program Studi">
                        @error('kode_prodi')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Nama Program Studi</label>
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="{{ $programStudi->nama_prodi }}" placeholder="Masukkan Nama Program Studi">
                        @error('nama_prodi')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
                
            </div>
        </div>
    </div>

</div>

@endsection
