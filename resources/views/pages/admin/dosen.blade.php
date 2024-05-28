@extends('layouts.content')
@section('title', 'Manajemen Dosen')

@section('content')

<div class="container-dashboard p-5 py-5">
        <div class="col-8 col-md-4 text-start ms-5">
            <h3 class="fw-bold"><i class="fas fa-chalkboard-teacher"></i> Manajemen Dosen</h3>
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
            <div class="d-flex align-items-start">
                <a href="{{ route('admin.tambahdosen') }}" class="btn btn-primary mb-3 p-2" style="width: 15%"><i class="bi bi-person-fill-add"></i> Tambah Data</a>
                        <form class="d-flex ms-auto" action="{{ route('admin.dosen') }}" method="GET" role="search">
                            <input type="hidden" name="page" value="1">
                            <input class="form-control me-2" type="search" name="keyword" id="search-input" placeholder="Cari dosen...">
                            <button class="btn btn-outline-secondary" style="width: 3em;" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
            </div>
            <table class="table table-striped table-responsive mt-2 text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIDN</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop untuk menampilkan data dosen -->
                    @foreach ($dosens as $index => $dosen)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->nama }}</td>
                        <td>{{ $dosen->email }}</td>
                         <td>
                            <!-- Tombol Profile -->
                    
                            <a href="{{ route('admin.dosen.profile', $dosen->id) }}" class="btn btn-info"><i class="bi bi-eye-fill"></i>Profile</a>


                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.dosen.editdosen', $dosen->id) }}"
                                class="btn btn-warning me-3"><i class="bi bi-pencil-square"></i>Edit</a>

                            <!-- Tombol Delete -->
                            <form action="{{ route('admin.dosen.hapusdosen', $dosen->id) }}" method="POST" style="display: inline-block;">
                              
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash-fill"></i>Delete</button>
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
