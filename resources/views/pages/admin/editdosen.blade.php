@extends('layouts.content')
@section('title', 'Edit Data Dosen')

@section('content')
<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="fw-bold">Edit Data Dosen</h3>
            <form action="{{ route('admin.dosen.updatedosen', $dosen->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nidn" class="form-label">NIDN</label>
                    <input type="text" class="form-control" id="nidn" name="nidn" value="{{ $dosen->nidn }}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $dosen->nama }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $dosen->email }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
