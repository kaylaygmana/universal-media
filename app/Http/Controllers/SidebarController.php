<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SidebarImage;
use Illuminate\Support\Facades\Storage;

class SidebarController extends Controller
{
    // Tampilkan form upload (opsional)
    public function create()
    {
        return view('sidebar.create'); // nanti buat file Blade sidebar/create.blade.php
    }

    // Simpan gambar yang diupload
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|max:2048', // max 2MB
            'judul' => 'nullable|string|max:255'
        ]);

        // Simpan file di storage/public/sidebar
        $path = $request->file('gambar')->store('sidebar', 'public');

        SidebarImage::create([
            'judul' => $request->judul,
            'gambar' => $path
        ]);

        return back()->with('success', 'Gambar berhasil diupload!');
    }

    // Tampilkan semua gambar di sidebar
    public function index()
    {
        $images = SidebarImage::latest()->get();
        return view('sidebar.index', compact('images')); // buat file sidebar/index.blade.php
    }
}
