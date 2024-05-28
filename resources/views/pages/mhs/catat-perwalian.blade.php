@extends('layouts.content')
@section('title', 'Pencatatan Perwalian')

@section('content')
<div class="container-dashboard py-5 p-5">
  <div class="row">
    <div class="col-8 col-md-4 text-start ms-5">
      <h3 class="fw-bold"><i class="bi bi-people-fill"></i> Pencatatan Perwalian</h3>
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <hr>
  <form action="{{ route('mhs.simpan-catatan-perwalian') }}" method="POST">
    @csrf
    <div class="row">
      <div class="card w-100 bg-body">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="fw-bold ms-1">Mata Kuliah yang Dipilih</h5>
          <!-- Tambahkan tombol ekspor PDF di dalam card-header -->
          <a href="{{ route('mhs.catat-perwalian.export-pdf') }}" class="btn btn-outline-primary">Ekspor ke PDF</a>
        </div>
        <div class="card-body">
          @if(count($mataKuliah) > 0)
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Matakuliah</th>
                  <th>SKS</th>
                  <th>Semester</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $totalSKS = 0;
                  $no = 1;
                @endphp
                @foreach($mataKuliah as $mk)
                  @php
                    $totalSKS += $mk->sks;
                  @endphp
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $mk->kode }}</td>
                    <td>{{ $mk->nama }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>{{ $mk->semester }}</td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3" class="text-end bg-body-secondary"><strong>Jumlah SKS</strong></td>
                  <td colspan="1" class="bg-body-secondary">{{ $totalSKS }}</td>
                </tr>
              </tfoot>
            </table>
            
         
          @else
            <p>Tidak ada mata kuliah yang dipilih.</p>
          @endif
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
