@extends('layouts.content')

@section('title', 'Manajemen Mahasiswa')

@section('content')

<div class="container-dashboard p-5 py-5">
    <div class="col-8 col-md-4 text-start ms-5">
        <h3 class="fw-bold">
            <i class="bi bi-person-fill"></i> Manajemen Mahasiswa
        </h3>
    </div>
    <hr>
    <div class="row justify-content-center mt-5">
        <div class="col-9">
            <form action="{{ route('admin.import_proses') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="excel_file" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Submit</button>
                </div>
            </form>
        </div>
        <div class="card card-rounded table-responsive" style="width: 100%;">
            <div class="d-flex align-items-start mb-3">
                <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary me-2 p-2" style="width: 15%">
                    <i class="bi bi-person-fill-add"></i> Tambah Data
                </a>
                <form class="d-flex ms-auto" action="{{ route('admin.mahasiswa') }}" method="GET" role="search">
                    <input type="hidden" name="page" value="1">
                    <input class="form-control me-2" type="search" name="keyword" id="search-input" placeholder="Cari mahasiswa...">
                    <button class="btn btn-outline-secondary" style="width: 3em;" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
            <table class="table table-striped table-responsive mt-2 text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Tahun Akademik</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop untuk menampilkan data mahasiswa -->
                    @foreach ($mahasiswa as $index => $mhs)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->email }}</td>
                        <td>{{ $mhs->program_studi }}</td>
                        <td>
                            @if ($mhs->tahun)
                                {{ $mhs->tahun->tahun_akademik }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <!-- Tombol Profile -->
                                <a href="{{ route('admin.profilmhs.show', $mhs->id) }}" class="btn btn-info me-md-2 mb-2 mb-md-0">
                                    <i class="bi bi-eye-fill"></i> Profile
                                </a>
                
                                <!-- Tombol Edit -->
                                <a href="{{ route('admin.mahasiswa.edit', $mhs->id) }}" class="btn btn-warning me-md-2 mb-2 mb-md-0">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                
                                <!-- Tombol Delete -->
                                <form action="{{ route('admin.mahasiswa.destroy', $mhs->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-2 mb-md-0" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
                
            </table>
        </div>
    </div>
</div>

@endsection