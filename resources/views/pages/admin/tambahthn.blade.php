<!-- resources/views/nama_view_tambah_tahun.blade.php -->

@extends('layouts.content')

@section('content')
<div class="container-dashboard  p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
           <h3 class="fw-bold"><i class="bi bi-person-fill-add"></i> Tambah Data </h3>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center mt-5">
        <div class="card card-rounded" style="width: 80%;">
            <div class="card-body">
                    <form method="POST" action="{{ route('admin.simpanthn') }}">
                        @csrf
                        <div class="form-group">
                            <label for="tahun_akademik">Tahun Akademik</label>
                            <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik"  value="{{ old('tahun_akademik') }}">
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select class="form-control" id="semester" name="semester" value="{{ old('semester') }}">
                                <option value="" selected disabled>Pilih Semester</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" value="{{ old('status') }}">
                                <option value="" selected disabled> Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Non-Aktif</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
