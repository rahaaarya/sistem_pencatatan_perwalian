@extends('layouts.content')
@section('title', 'Data Perwalian')

@section('content')
    <div class="container-dashboard p-5 py-5">
        <div class="row">
            <div class="col-8 col-md-4 text-start ms-5">
                <h3 class="fw-bold"><i class="fas fa-chalkboard-teacher"></i>Data Perwalian</h3>
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
                            <th scope="col">Tanggal Perwalian</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $nomorUrutan = 1; @endphp
                        @foreach ($mahasiswa as $perwalian)
                            <tr>
                                <td>{{ $nomorUrutan++ }}</td>
                                <td>{{ $perwalian->nim }}</td>
                                <td>{{ $perwalian->nama }}</td>
                                <td>{{ $perwalian->program_studi }}</td>
                                <td>
                                    @if ($perwalian->perwalian->isNotEmpty())
                                        {{ $perwalian->perwalian->first()->tanggal_perwalian }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dosen.detail-catatan', $perwalian->nim) }}"
                                        class="btn btn-primary">Detail Catatan</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
{{--

@foreach ($mahasiswa as $m)
    <li>
        <a href="{{ route('dosen.detail-catatan', $m->nim) }}">{{ $m->nama }} ({{ $m->nim }})</a>
    </li>
@endforeach --}}
