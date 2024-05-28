<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa; // Import Mahasiswa model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home'; // Sesuaikan redirect setelah pendaftaran

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {

        dd($data);

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,dosen,mahasiswa'], // Validasi role
        ]);
    }

    protected function create(array $data)
    {
        // Find the mahasiswa entry by email
        $mahasiswa = Mahasiswa::where('email', $data['email'])->first();

        // Create the user with the mahasiswa_id if found
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'], // Simpan peran pengguna
            'mahasiswa_id' => $mahasiswa ? $mahasiswa->id : null, // Set mahasiswa_id if found
        ]);
    }
}
