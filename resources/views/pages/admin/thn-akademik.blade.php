@extends('layouts.content')
@section('title', 'Tahun Akademik')

@section('content')
<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
            <h3 class="fw-bold"><i class="bi bi-journal-bookmark-fill"></i> Data Tahun Akademik</h3>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center mt-5">
        <div class="card card-rounded table-responsive" style="width: 100%;">
            <div class="col-12 d-flex align-items-start">
                <a href="{{ route('admin.tambahthn') }}" class="btn btn-primary mb-3 p-2" style="width: 15%">
                    <i class="bi bi-person-fill-add"></i> Tambah Data
                </a>
                <form class="d-flex ms-auto" action="{{ route('admin.thn-akademik') }}" method="GET" role="search">
                    <input type="hidden" name="page" value="1">
                    <input class="form-control me-2" type="search" name="keyword" id="search-input"
                        placeholder="Cari tahun akademik...">
                    <button class="btn btn-outline-secondary" style="width: 3em;" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
            <table class="table table-striped table-responsive mt-5 text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tahun Akademik</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tahunAkademiks as $tahunakademik)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tahunakademik->tahun_akademik }}</td>
                        <td>{{ $tahunakademik->semester }}</td>
                        <td>{{ $tahunakademik->status }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.editthn', $tahunakademik->id) }}"
                                class="btn btn-warning me-3"><i class="bi bi-pencil-square"></i> Edit</a>

                            <!-- Tombol Delete -->
                            <form action="{{ route('admin.hapusthn', $tahunakademik->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="bi bi-trash-fill"></i> Delete
                                </button>
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
