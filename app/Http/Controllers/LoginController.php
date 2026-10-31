<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // <--- ini wajib ditambahkan

class LoginController extends Controller
{
    public function showForm()
{
    // Jika sudah login, tampilkan form login tapi beri info
    if (session('admin')) {
        return redirect()->route('upload.admin')->with('success', 'Login berhasil!');

    }

    // Kalau belum login, tampilkan form login biasa
    return view('partials.login');
}


    public function proses(Request $request)
{
    $username = $request->username;
    $password = $request->password;

    if ($username === 'admin' && $password === '1234') {
        session(['admin' => true]);

        $beritas = \App\Models\Berita::all();

        // Tidak redirect, langsung render view upload
        return view('partials.upload', compact('beritas'))
               ->with('success', 'Login berhasil!');
    }

    return back()->with('error', 'Username atau password salah!');
}

    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('login.form')->with('success', 'Anda telah logout.');
    }
}
