@extends('layouts.content')
@section('title', 'Manajemen Matakuliah')

@section('content')

<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
            <h3 class="fw-bold"><i class="fas fa-chalkboard-teacher"></i> Manajemen Matakuliah</h3>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center mt-5">
            <div class="card card-rounded table-responsive" style="width: 100%;">
            <div class="d-flex align-items-start">
                <a href="{{ route('admin.tambahmatkul') }}" class="btn btn-primary mb-3 p-2" style="width: 15%"><i class="bi bi-person-fill-add"></i> Tambah Data</a>
                <form class="d-flex ms-auto" action="{{ route('admin.matakuliah') }}" method="GET" role="search">
                    <input type="hidden" name="page" value="1">
                    <input class="form-control me-2" type="search" name="keyword" id="search-input" placeholder="Cari matakuliah...">
                    <button class="btn btn-outline-secondary" style="width: 3em;" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
            <table class="table table-striped table-responsive mt-5 text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Matakuliah</th>
                        <th scope="col">Nama</th>
                        <th scope="col">SKS</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop untuk menampilkan data dosen -->
                    @foreach ($mataKuliahs as $index => $mataKuliah)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $mataKuliah->kode }}</td>
                        <td>{{$mataKuliah->nama }}</td>
                        <td>{{$mataKuliah->sks }}</td>
                        <td>{{ $mataKuliah->semester }}</td>
                        <td>{{ $mataKuliah->program_studi }}</td>
                        <td>
                            <a href="{{ route('admin.editmatkul', $mataKuliah->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Edit</a>
                            <form action="{{ route('admin.destroy', $mataKuliah->id) }}" method="POST"  style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash-fill"></i>Delete</button>
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

