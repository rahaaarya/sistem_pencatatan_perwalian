<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetDosenId
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user adalah seorang dosen
        if (Auth::check() && Auth::user()->role === 'dosen') {
            // Dapatkan ID dosen yang sedang login
            $dosenId = Auth::user()->id;

            // Temukan model User yang sedang login
            $user = User::find(Auth::id());

            // Set dosen_id pada model User
            $user->dosen_id = $dosenId;

            // Simpan perubahan
            $user->save();
        }

        return $next($request);
    }
}
