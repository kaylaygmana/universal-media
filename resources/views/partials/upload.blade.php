@extends('layouts.app')

@section('content')

<!-- HALAMAN ADMIN SETELAH LOGIN -->

<div class="container mt-3 text-end">
    <form action="{{ route('logout') }}" method="GET" class="d-inline">
        <button type="submit" class="btn btn-danger">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</div>

<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Tambah Berita</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Pemerintahan">Pemerintahan</option>
                        <option value="Olahraga">Olahraga</option>
                        <option value="Lifestyle">Lifestyle</option>
                        <option value="Kriminalitas">Kriminalitas</option>
                        <option value="Evergreen">Evergreen</option>
                        <option value="Daerah">Daerah</option>
                        <option value="Peristiwa">Peristiwa</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Berita</label>
                    <textarea name="isi" rows="5" class="form-control" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send"></i> Posting
                    </button>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container py-4">
    <h3>Upload Gambar Sidebar</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('sidebar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="judul" placeholder="Judul gambar" class="form-control mb-2">
        <input type="file" name="gambar" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-dark text-white text-center">
        <h4 class="mb-0">Daftar Berita</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($beritas as $index => $berita)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->kategori }}</td>
                        <td class="text-center">{{ $berita->tanggal }}</td>
                        <td class="text-center">
                            @if($berita->foto)
                                <img src="{{ asset('storage/' . $berita->foto) }}" width="80" class="rounded">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada berita.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
