@extends('../layouts/main')

@include('../partials/navbar')
@section('content')
<div class="container py-5">
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h5 class="text-center mb-4">Pendaftaran Pengguna Baru</h5>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" value="{{ old('email') }}" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Peran</label>
                <select name="role" class="form-select">
                    <option value="admin">Admin</option>
                    <option value="dosen">Dosen</option>
                    <option value="mahasiswa">Mahasiswa</option>
                </select>
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Daftar</button>
            </div>
        </form>
        <div class="text-center">
            Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</div>
@endsection
