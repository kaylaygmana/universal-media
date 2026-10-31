@extends('layouts.app')


@section('title', $berita->judul)

@section('meta_description', Str::limit(strip_tags($berita->isi), 160))

@section('og_title', $berita->judul)

@section('og_description', Str::limit(strip_tags($berita->isi), 160))

@section('og_image', $berita->foto ? asset('storage/'.$berita->foto) : asset('images/no-image.png'))
@section('content')

@if($berita)
<div class="container my-5">
    <div class="row">

        <!-- Konten Berita Utama (kiri) -->
        <div class="col-lg-8 text-start order-1 order-lg-1">
            <!-- Gambar utama -->
            <img src="{{ $berita->foto ? asset('storage/' . $berita->foto) : asset('images/no-image.png') }}" 
                 alt="{{ $berita->judul }}" 
                 class="img-fluid rounded shadow-sm mb-4" 
                 style="width: 100%; height: auto;">

            <!-- Judul & Meta -->
            <h1 class="fw-bold mb-3">{{ $berita->judul }}</h1>
            <div class="d-flex text-muted mb-3" style="font-size: 0.9rem; gap: 0.5rem;">
                <span>
                    <i class="bi bi-calendar-event"></i> 
                    {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                </span>
                <span class="text-secondary">|</span>
                <span>
                    <i class="bi bi-tag"></i> {{ $berita->kategori }}
                </span>
            </div>

            <!-- Isi berita -->
            <div>
                <p class="lh-lg" style="font-size: 1.1rem; text-align: justify; word-wrap: break-word;">
                    {!! nl2br(e($berita->isi)) !!}
                </p>
            </div>
        </div>

        <!-- Sidebar Berita Terbaru (kanan) -->
        <div class="col-lg-4 mb-4 mt-4 order-2 order-lg-2">
            <div class="card border-0 shadow-sm" style="position: sticky; top: 130px;">
                <div class="card-header bg-dark text-white">
                    <strong class="text-danger">Berita Terbaru</strong>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach(\App\Models\Berita::orderBy('tanggal','desc')->take(8)->get() as $b)
                        <li class="list-group-item d-flex align-items-center">
                            <img src="{{ $b->foto ? asset('storage/' . $b->foto) : asset('images/no-image.png') }}" 
                                 alt="{{ $b->judul }}" 
                                 class="me-3 rounded" 
                                 style="width: 70px; height: 70px; object-fit: cover;">
                            <div>
                                <a href="{{ route('berita.show', $b->slug) }}" 
                                   class="text-decoration-none fw-semibold text-dark">
                                    {{ Str::limit($b->judul, 60) }}
                                </a>
                                <div class="text-muted" style="font-size: 0.8rem;">
                                    {{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>
@endif

@endsection
