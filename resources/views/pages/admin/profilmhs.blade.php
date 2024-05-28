<!-- resources/views/pages/admin/profilmhs.blade.php -->
@extends('layouts.content')
@section('title', 'Profil Mahasiswa')

@section('content')
<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
            <h3 class="fw-bold"><i class="fas fa-user-graduate"></i> Profil Mahasiswa</h3>
        </div>
    </div>
    <hr>
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Mahasiswa</h5>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">NIM</th>
                                <td>{{ $mahasiswa->nim }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama</th>
                                <td>{{ $mahasiswa->nama }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $mahasiswa->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Program Studi</th>
                                <td>{{ $mahasiswa->program_studi }}</td>
                            </tr>
                            <!-- Tambahkan informasi profil mahasiswa lainnya sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
