<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'password.required' => 'Password wajib diisi.'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return $this->redirectBasedOnRole(Auth::user()->role);
        } else {
            return redirect()->back()->withErrors('Email dan Password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,dosen,mahasiswa',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        // Jika peran adalah 'mahasiswa', gunakan id yang sama dengan mahasiswa_id
        if ($request->role == 'mahasiswa') {
            $mahasiswa = Mahasiswa::where('email', $request->email)->first();
            if ($mahasiswa) {
                $user->id = $mahasiswa->id; // Set id pengguna sama dengan id mahasiswa
                $user->mahasiswa_id = $mahasiswa->id;
            } else {
                return redirect()->back()->with('error', 'Registrasi gagal. Pastikan email yang Anda masukkan sesuai dengan data yang ada dalam sistem.');
            }
        }
        // Jika peran adalah 'dosen', gunakan dose_id yang sesuai
        elseif ($request->role == 'dosen') {
            // Mengambil dose_id dari tabel dosen berdasarkan email
            $dosen = Dosen::where('email', $request->email)->first();
            if ($dosen) {
                $user->dosen_id = $dosen->id; // Set dose_id pengguna sama dengan id dosen
            } else {
                return redirect()->back()->with('error', 'Registrasi gagal. Pastikan email yang Anda masukkan sesuai dengan data yang ada dalam sistem.');
            }
        }

        $user->save();

        // Redirect the user after successful registration
        return $this->redirectBasedOnRole($user->role);
    }




    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    protected function redirectBasedOnRole($role)
    {
        if ($role == 'admin') {
            return redirect('admin');
        } elseif ($role == 'dosen') {
            return redirect('dosen');
        } elseif ($role == 'mahasiswa') {
            return redirect('mahasiswa');
        } else {
            return redirect('/');
        }
    }
}
