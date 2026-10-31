<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Tampilkan semua berita di halaman utama
     */
public function index()
{
    $beritas = Berita::orderBy('tanggal', 'desc')->get();

    // ===== Berita Utama =====
    $beritaUtama = $beritas->first();
    if (!$beritaUtama && $beritas->count() > 0) {
        $beritaUtama = $beritas->first();
    }

    // ===== Berita Kecil (4 item) =====
    $beritaKecil = $beritas->slice(1, 4);
    if ($beritaKecil->count() < 4 && $beritaKecil->count() > 0) {
        while ($beritaKecil->count() < 4) {
            $beritaKecil = $beritaKecil->concat($beritaKecil);
        }
        $beritaKecil = $beritaKecil->take(4);
    }

    // ===== Berita Carousel (3 item setelah utama + 4 kecil) =====
    $beritaCarousel = $beritas->slice(5, 3)->values();

    $berita1 = $beritaCarousel->get(0);
    $berita2 = $beritaCarousel->get(1);
    $berita3 = $beritaCarousel->get(2);

// ===== Berita Tren (4 item setelah carousel) =====
    $beritaTren = $beritas->slice(8, 4)->values();

    $berita7  = $beritaTren->get(0);
    $berita8  = $beritaTren->get(1);
    $berita9  = $beritaTren->get(2);
    $berita10 = $beritaTren->get(3);

    $beritaLainnya = Berita::orderBy('tanggal','desc')
    ->skip(12)
    ->paginate(10);

    return view('partials.utama', compact(
        'beritas', 
        'beritaUtama', 
        'beritaKecil', 
        'beritaCarousel', 
        'berita1', 
        'berita2', 
        'berita3',
        'beritaTren',
        'berita7',
        'berita8',
        'berita9',
        'berita10',
        'beritaLainnya'
    ));    
}




    /**
     * Tampilkan detail 1 berita berdasarkan slug
     */
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('partials.single', compact('berita'));
    }

    /**
     * Form tambah berita
     */
    public function create()
    {
    $beritas = Berita::orderBy('tanggal', 'desc')->get();
    return view('partials.upload', compact('beritas'));
}

    /**
     * Simpan berita baru
     */
    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
                'isi' => 'required|string',
        'tanggal' => 'required|date',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $berita = new Berita();
    $berita->judul = $request->judul;
    $berita->kategori = $request->kategori; // <- pastikan ini ada
    $berita->isi = $request->isi;
    $berita->tanggal = $request->tanggal;
    $berita->slug = Str::slug($request->judul);

    // upload foto jika ada
    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('berita', 'public');
        $berita->foto = $path;
    }

    $berita->save();

    return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
}


    /**
     * Form edit berita
     */
    public function edit(Berita $berita)
    {
        return view('partials.edit', compact('berita'));
    }

    /**
     * Update berita
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'kategori' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('judul', 'isi', 'tanggal', 'kategori');

        // generate slug unik
        $slug = Str::slug($request->judul);
        $count = Berita::where('slug', 'LIKE', "{$slug}%")
                       ->where('id', '!=', $berita->id)
                       ->count();
        $data['slug'] = $count ? $slug . '-' . ($count + 1) : $slug;

        if ($request->hasFile('foto')) {
            if (!Storage::exists('public/berita')) {
                Storage::makeDirectory('public/berita');
            }
            if ($berita->foto && Storage::exists('public/' . $berita->foto)) {
                Storage::delete('public/' . $berita->foto);
            }
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Hapus berita
     */
public function destroy(Berita $berita)
{
    if ($berita->foto && Storage::exists('public/' . $berita->foto)) {
        Storage::delete('public/' . $berita->foto);
    }

    $berita->delete();

    return redirect()->route('upload.admin')->with('success', 'Berita berhasil dihapus!');
}



public function adminIndex()
{
    $beritas = Berita::orderBy('tanggal', 'desc')->get();
    return view('partials.upload', compact('beritas'));
}

public function kategori($kategoriName)
{
    // Ambil kategori berdasarkan nama
    $beritaKecil = Berita::where('kategori', $kategoriName)->latest()->get();

    // Sidebar global (semua kategori)
    $sidebarBerita = Berita::latest()->take(5)->get();

    return view('partials.kategori', compact('beritaKecil', 'sidebarBerita', 'kategoriName'));
}
}