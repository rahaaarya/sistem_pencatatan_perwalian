@extends('../layouts/main')

@include('../partials/navbar')
@section('content')
<div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h5 class="text-center mb-4">Selamat datang di Portal Perwalian STMIK Bandung! Yuk, akses akun Anda untuk memulai perwalian.</h5>
       @if($errors->any())
       <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
       </div>
       @endif
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" value="{{ old('email') }}" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                 <div class="input-group">
                    <input type="password" name="password" class="form-control">
                    <button type="button" class="btn btn-outline-secondary" id="show-password">Show</button>
                 </div>
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="text-center">
               Belum punya akun? <a href="{{ route('register') }}">Register</a>
            </div>
        </form>
    </div> 
    </div>

    
@endsection
