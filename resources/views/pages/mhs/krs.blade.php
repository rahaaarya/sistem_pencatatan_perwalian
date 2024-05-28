@extends('layouts.content') 
@section('title', 'Pencatatan Perwalian')

@section('content')
<div class="container-dashboard py-5 p-5">
  <div class="row">
    <div class="col-8 col-md-4 text-start ms-5">
      <h3 class="fw-bold"><i class="bi bi-people-fill"></i>Pencatatan Perwalian</h3>
    </div>
    <div class="col-12 col-md-4 ms-auto">
      <form class="d-flex ms-auto" action="{{ route('mhs.krs') }}" method="GET" role="search">
        <input class="form-control me-2" type="search" name="keyword" placeholder="Cari Semester..." aria-label="Search">
        <button class="btn btn-outline-primary" style="width: 3em;" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <hr>
  <div class="row">
    <div class="card w-100 bg-body">
      <h5 class="fw-bold ms-1">Kartu Rencana Studi</h5>
      <div class="card-body">
        @isset($mataKuliah)
          <form action="{{ route('mhs.simpan-catatan-perwalian') }}" method="POST">
            @csrf
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Pilih</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>SKS</th>
                  <th>Semester</th>
                </tr>
              </thead>
              <tbody>
                @foreach($mataKuliah as $mk)
                  <tr>
                    <td>
                      <input type="checkbox" name="selectedMataKuliah[]" value="{{ $mk->id }}">
                    </td>
                    <td>{{ $mk->kode }}</td>
                    <td>{{ $mk->nama }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>{{ $mk->semester }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Simpan Catatan Perwalian</button>

        @else
          <p>Tidak ada data mata kuliah ditemukan.</p>
        @endisset
      </div>
    </div>
  </div>
</div>
@endsection
