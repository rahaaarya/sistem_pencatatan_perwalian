@extends('layouts.content')
@section('title', 'Rekap Perwalian')

@section('content')

    <div class="container-dashboard p-5 py-5">
        <div class="row">
            <div class="col-8 col-md-4 text-start ms-5">
                <h3 class="fw-bold"><i class="fas fa-chalkboard-teacher"></i>Rekap Perwalian</h3>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center mt-5">
            <div class="card card-rounded table-responsive" style="width: 100%;">
                <div class="d-flex align-items-start">
                    <a href="{{ route('admin.tambahwali') }}" class="btn btn-primary mb-3 p-2" style="width: 15%"><i
                            class="bi bi-person-fill-add"></i> Tambah Data</a>
                    <form class="d-flex ms-auto" action="{{ route('admin.perwalian') }}" method="GET" role="search">
                        <input type="hidden" name="page" value="1">
                        <input class="form-control me-2" type="search" name="keyword" id="search-input"
                            placeholder="Cari Rekap data...">
                        <button class="btn btn-outline-secondary" style="width: 3em;" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
                <table class="table table-striped table-responsive mt-5 text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Dosen</th>
                            <th scope="col">Tahun Akademik</th>
                            <th scope="col">Tanggal Perwalian</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop untuk menampilkan data perwalian -->
                        @foreach ($perwalians as $perwalian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $perwalian->nim }}</td>
                                <td>{{ $perwalian->mahasiswa->nama }}</td>
                                <td>{{ $perwalian->mahasiswa->program_studi }}</td>
                                <td>{{ $perwalian->dosen->nama }}</td>
                                <td>{{ $perwalian->tahunAkademik->tahun_akademik }}</td>
                                <td>{{ $perwalian->tanggal_perwalian }}</td>
                                <td>
                                    <a href="{{ route('admin.editperwalian', $perwalian->id) }}" class="btn btn-warning"><i
                                            class="bi bi-pencil-square"></i>Edit</a>
                                    <form action="{{ route('admin.deleteperwalian', $perwalian->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                class="bi bi-trash-fill"></i>Delete</button>
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
