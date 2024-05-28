@extends('layouts.content')
@section('title', 'Histori Data Perwalian')

@section('content')
    <div class="container-dashboard p-5 py-5">
        <div class="row">
            <div class="col-8 col-md-4 text-start ms-5">
                <h3 class="fw-bold"><i class="fas fa-chalkboard-teacher"></i>Histori Data Perwalian</h3>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center mt-5">
            <div class="card card-rounded table-responsive" style="width: 100%;">
                <table class="table table-striped table-responsive mt-5 text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Tanggal Catatan</th>
                            <th scope="col">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $nomorUrutan = 1; @endphp
                        @foreach ($historiPerwalian as $perwalian)
                            <tr>
                                <td>{{ $nomorUrutan++ }}</td>
                                <td>{{ $perwalian->mahasiswa->nim }}</td>
                                <td>{{ $perwalian->mahasiswa->nama }}</td>
                                <td>{{ $perwalian->mahasiswa->program_studi }}</td>
                                <td>{{ $perwalian->catatanTerbaru->created_at->format('m-d-Y') }}</td>
                                <td>{{ strip_tags($perwalian->catatanTerbaru->catatan) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
