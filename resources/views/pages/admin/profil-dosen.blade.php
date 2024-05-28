<!-- resources/views/pages/admin/profile_dosen.blade.php -->
@extends('layouts.content')
@section('title', 'Profil Dosen')

@section('content')
<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
            <h3 class="fw-bold"><i class="fas fa-chalkboard-teacher"></i> Profil Dosen</h3>
        </div>
    </div>
    <hr>
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Dosen</h5>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">NIDN</th>
                                <td>{{ $dosen->nidn }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama</th>
                                <td>{{ $dosen->nama }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $dosen->email }}</td>
                            </tr>
                            <!-- Tambahkan informasi profil dosen lainnya sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
