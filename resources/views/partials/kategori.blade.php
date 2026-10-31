@extends('layouts.app')

@section('content')

{{-- STYLE --}}
<style>
#carouselBeritaKriminalitas {
    width: 65%;
    margin: 0 auto;
}

#carouselBeritaKriminalitas .carousel-item img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.hover-zoom img {
    transition: transform 0.3s ease;
}
.hover-zoom:hover img {
    transform: scale(1.05);
}

.carousel-item img {
    height: 400px;
    object-fit: cover;
}

#carouselBeritaKriminalitas .carousel-item {
    position: relative;
    overflow: hidden;
}

#carouselBeritaKriminalitas .carousel-item img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

#carouselBeritaKriminalitas .carousel-item:hover img {
    transform: scale(1.05);
}

#carouselBeritaKriminalitas .carousel-item::before {
    content: '';
    position: absolute;
    top:0; left:0;
    width:100%; height:100%;
    background-color: rgba(0,0,0,0.4);
    opacity:0;
    transition: opacity 0.5s ease;
    z-index:1;
}

#carouselBeritaKriminalitas .carousel-item:hover::before {
    opacity:1;
}

#carouselBeritaKriminalitas .carousel-caption {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translate(-50%, 50px);
    opacity: 0;
    text-align: center;
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    transition: transform 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55), opacity 0.8s ease;
    z-index: 2;
}

#carouselBeritaKriminalitas .carousel-caption .tanggal {
    font-size: 1rem;
    font-weight: 400;
    color: #ffffff;
    margin-top: 5px;
}

#carouselBeritaKriminalitas .carousel-item.active .carousel-caption {
    transform: translate(-50%, 0);
    opacity: 1;
    transition-delay: 0.2s;
}

#carouselBeritaKriminalitas .carousel-control-prev,
#carouselBeritaKriminalitas .carousel-control-next {
    z-index: 3;
    pointer-events: auto;
}

.bold-title {
    font-weight: 900;
    font-size: 1.5rem;
    color: white;
    margin-right: 100px;
}
.judulberitakecil {
    font-weight: 900;
    font-size: 1rem;
    color: white;
    margin-right: 10px;
}
</style>

{{-- Kategori Berita Grid --}}
<div class="container-fluid pt-4" style="position: relative; z-index: 50; margin-top:50px">
    
    <div class="container">
        <div class="row g-3">
            @foreach($beritaKecil as $berita)
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ $berita->foto ? asset('storage/' . $berita->foto) : 'https://via.placeholder.com/400x250' }}"
                             alt="{{ $berita->judul }}" 
                             class="card-img-top" 
                             style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <small class="text-muted d-block mb-2">
                                {{ \Carbon\Carbon::parse($berita->tanggal)->format('M d, Y') }}
                            </small>
                            <a href="{{ route('berita.show', $berita->slug) }}" class="stretched-link text-decoration-none text-dark">
                                <h6 class="card-title mb-0">{{ Str::limit($berita->judul, 60) }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Konten Utama --}}
<div class="container py-4">
    <div class="row">
        <div class="col-lg-9">
            {{-- Carousel --}}
            <div id="carouselBeritaKriminalitas" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($beritaKecil as $index => $berita)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <a href="{{ route('berita.show', $berita->slug) }}">
                                <img src="{{ $berita->foto ? asset('storage/' . $berita->foto) : 'https://via.placeholder.com/800x400' }}" 
                                     class="d-block w-100 rounded" alt="{{ $berita->judul }}">
                                <div class="carousel-caption d-block">
                                    <h5 class="fw-bold">{{ $berita->judul }}</h5>
                                    <small class="text-light">{{ \Carbon\Carbon::parse($berita->tanggal)->format('M d, Y') }}</small>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselBeritaKriminalitas" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselBeritaKriminalitas" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            {{-- Business Section --}}
            <span class="badge bg-dark text-white">Kategori Pencarian</span>
            <h2 class="mb-3 mt-0">Business</h2>
            <div class="mb-4">
                @foreach(['BANDA ACEH','MEDAN','PADANG','PEKANBARU','TANJUNG PINANG','MAKASSAR','SAMARINDA'] as $kota)
                    <button class="btn btn-outline-secondary btn-sm me-2 mb-2">{{ $kota }}</button>
                @endforeach
            </div>

            {{-- News List --}}
            <div class="row">
                @foreach($beritaKecil as $berita)
                    <div class="col-12 mb-4">
                        <a href="{{ route('berita.show', $berita->slug) }}" class="text-decoration-none text-dark">
                            <div class="row g-3 align-items-start">
                                <div class="col-md-4">
                                    <div style="width: 100%; aspect-ratio: 5/3; overflow: hidden;">
                                        <img src="{{ $berita->foto ? asset('storage/' . $berita->foto) : 'https://via.placeholder.com/400x240' }}" 
                                             class="img-fluid w-100 h-100" 
                                             style="object-fit: cover;" 
                                             alt="News Image">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="fw-bold">{{ $berita->judul }}</h4>
                                    <small class="text-dark">{{ \Carbon\Carbon::parse($berita->tanggal)->format('M d, Y') }}</small>
                                    <p>{{ Str::limit($berita->isi, 120, '...') }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Sidebar Kanan --}}
        <div class="col-lg-3 mb-4 mt-0">
            <div class="card border-0 shadow-sm" style="position: sticky; top: 130px;">
                <div class="card-header bg-dark text-white">
                    <strong class="text-danger">Berita Terbaru</strong>
                </div>

                {{-- Gambar Sidebar --}}
                <div class="p-2">
                    @foreach(\App\Models\SidebarImage::latest()->take(1)->get() as $img)
                        <img src="{{ asset('storage/' . $img->gambar) }}" 
                             class="img-fluid rounded mb-3" 
                             alt="{{ $img->judul ?? 'Sidebar Image' }}">
                    @endforeach
                </div>

                {{-- List Berita Terbaru Global --}}
                <ul class="list-group list-group-flush">
                    @foreach($sidebarBerita as $b)
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
                                    <small class="text-dark">{{ \Carbon\Carbon::parse($b->tanggal)->format('M d, Y') }}</small>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- Carousel Caption Style --}}
<style>
.carousel-caption {
    padding: 10px 15px;
    border-radius: 10px;
    bottom: 20px;
}

.carousel-caption h2 {
    font-size: 1.1rem;
    margin-bottom: 5px;
}

#carouselBeritaKriminalitas {
    width: 100%;
    max-width: 100%;
}

.carousel-caption small {
    font-size: 0.9rem;
}

@media (max-width: 576px) {
    .carousel-caption {
        padding: 8px 10px;
        bottom: 10px;
    }
    .carousel-caption h5 {
        font-size: 0.95rem;
    }
    .carousel-caption small {
        font-size: 0.8rem;
    }
}
</style>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
