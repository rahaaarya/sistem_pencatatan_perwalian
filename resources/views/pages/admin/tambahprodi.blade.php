@extends('layouts.content')
@section('title')
Tambah Program Studi
@endsection

@section('content')

<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
           <h3 class="fw-bold"><i class="bi bi-journal-bookmark-fill"></i>
            Tambah Program Studi
             </h3> 
        </div>
       
    </div>
    <hr>
    <div class="row d-flex justify-content-center mt-5">
        <div class="card card-rounded" style="width: 80%;">
            <div class="card-body">
                <form action="{{ route('admin.kirimprodi') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_prodi" class="form-label">Kode Program Studi</label>
                        <input type="text" class="form-control @error('kode_prodi') is-invalid @enderror" id="kode_prodi" name="kode_prodi" placeholder="Masukkan Kode Program Studi">
                        @error('kode_prodi')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Nama Program Studi</label>
                        <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" id="nama_prodi" name="nama_prodi" placeholder="Masukkan Nama Program Studi">
                        @error('nama_prodi')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                
            </div>
        </div>
    </div>
    
</div>

@endsection
