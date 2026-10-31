@extends('layouts.app') {{-- ganti kalau layout kamu beda --}}

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Edit Berita</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('berita.update', $berita) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" 
                   name="judul" 
                   class="form-control"
                   value="{{ old('judul', $berita->judul) }}" 
                   required>
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" 
                   name="kategori" 
                   class="form-control"
                   value="{{ old('kategori', $berita->kategori) }}" 
                   required>
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" 
                   name="tanggal" 
                   class="form-control"
                   value="{{ old('tanggal', $berita->tanggal) }}" 
                   required>
        </div>

        {{-- Isi --}}
        <div class="mb-3">
            <label class="form-label">Isi Berita</label>
            <textarea name="isi" 
                      class="form-control" 
                      rows="6" 
                      required>{{ old('isi', $berita->isi) }}</textarea>
        </div>

        {{-- Foto Lama --}}
        @if($berita->foto)
            <div class="mb-3">
                <label class="form-label">Foto Saat Ini</label><br>
                <img src="{{ asset('storage/' . $berita->foto) }}" 
                     width="200" 
                     class="img-thumbnail">
            </div>
        @endif

        {{-- Upload Foto Baru --}}
        <div class="mb-3">
            <label class="form-label">Ganti Foto (opsional)</label>
            <input type="file" 
                   name="foto" 
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Update Berita
        </button>

        <a href="{{ route('berita.index') }}" 
           class="btn btn-secondary">
            Batal
        </a>

    </form>
</div>

@endsection
