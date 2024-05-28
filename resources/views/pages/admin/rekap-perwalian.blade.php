@extends('layouts.content')

@section('title')
Rekap Data Perwalian
@endsection

@section('content')
<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
            <h3 class="fw-bold"><i class="bi bi-journal-bookmark-fill"></i> Rekap Data Perwalian</h3>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center mt-5">
        <div class="card card-rounded table-responsive" style="width: 80%;">
            <div class="col-12 d-flex align-items-start">
                <a href="{{ route('admin.tambahperwalian') }}" class="btn btn-primary mb-3 p-2" style="width: 15%"><i
                        class="bi bi-person-fill-add"></i> Tambah Data</a>
                <form class="d-flex ms-auto" action="{{ route('admin.rekap-perwalian') }}" method="GET" role="search">
                    <input type="hidden" name="page" value="1">
                    <input class="form-control me-2" type="search" name="keyword" id="search-input"
                        placeholder="Cari data perwalian...">
                    <button class="btn btn-outline-secondary" style="width: 3em;" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
            <table class="table table-striped table-responsive mt-5 text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM Mahasiswa</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Dosen Wali</th>
                        <th scope="col">Tahun Akademik</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">Tanggal Perwalian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perwalians as $perwalian)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $perwalian->mahasiswa->nim }}</td>
                        <td>{{ $perwalian->mahasiswa->nama }}</td>
                        <td>{{ $perwalian->dosen->nama }}</td>
                        <td>{{ $perwalian->tahun_akademik }}</td>
                        <td>{{ $perwalian->mata_kuliah }}</td>
                        <td>{{ $perwalian->tanggal_perwalian }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.editperwalian', $perwalian->id) }}"
                                class="btn btn-warning me-3"><i class="bi bi-pencil-square"></i> Edit</a>

                            <!-- Tombol Delete -->
                            <form action="{{ route('admin.hapusperwalian', $perwalian->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                        class="bi bi-trash-fill"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
