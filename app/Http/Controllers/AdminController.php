<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Pastikan hanya user dengan role admin yang dapat mengakses halaman ini
        if (Auth::user()->role !== 'admin') {
            abort(403); // Unauthorized
        }

        // Load view halaman admin
        return view('pages/admin/admin');
    }
}
