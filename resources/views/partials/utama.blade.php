@extends('layouts.app')

@section('content')



{{-- STYLE --}}
<style>

.fh5co_suceefh5co_height_2 {
    aspect-ratio: 1/1; /* kotak */
    overflow: hidden;
}

.fh5co_suceefh5co_height_2 img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


#carouselBerita {
    width: 65%;           /* 75% dari lebar halaman */
    margin: 0 auto;       /* center horizontal */
}

/* Pastikan gambar menyesuaikan lebar carousel */
#carouselBerita .carousel-item img {
    width: 100%;
    height: 400px;        /* tetap tinggi 400px, bisa disesuaikan */
    object-fit: cover;
}

/* Hover Zoom untuk berita */
.hover-zoom img {
    transition: transform 0.3s ease;
}
.hover-zoom:hover img {
    transform: scale(1.05);
}

/* Carousel */
.carousel-item img {
    height: 400px;
    object-fit: cover;
}

/* CSS Incline Aman */
/* ---------------- Carousel Berita ---------------- */
#carouselBerita .carousel-item {
    position: relative;
    overflow: hidden;
}

/* Gambar default */
#carouselBerita .carousel-item img {
    width: 100%;
    height: 400px;
    object-fit: cover;
           /* efek miring ringan */
    transition: transform 0.5s ease;
}

/* Zoom saat hover */
#carouselBerita .carousel-item:hover img {
    transform: scale(1.05);             /* zoom ringan */
}

/* Overlay gelap */
#carouselBerita .carousel-item::before {
    content: '';
    position: absolute;
    top:0; left:0;
    width:100%; height:100%;
    background-color: rgba(0,0,0,0.4);
    opacity:0;
    transition: opacity 0.5s ease;
    z-index:1;
}

/* Overlay muncul saat hover (opsional, bisa selalu visible) */
#carouselBerita .carousel-item:hover::before {
    opacity:1;
}

/* Caption awal (tersembunyi & di bawah) */
#carouselBerita .carousel-caption {
    position: absolute;
    bottom: 20px;                        /* bisa disesuaikan */
    left: 50%;
    transform: translate(-50%, 50px);    /* mulai di bawah */
    opacity: 0;
    text-align: center;
    font-size: 2rem;                      /* besar */
    font-weight: 700;                     /* bold */
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    transition: transform 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55), opacity 0.8s ease;
    transition-delay: 0s;
    z-index: 2;
}

#carouselBerita .carousel-caption .tanggal {
    font-size: 1rem;       /* lebih kecil */
    font-weight: 400;      /* lebih tipis */
    color: #ffffff;           /* opsional: warna lebih lembut */
    margin-top: 5px;       /* jarak dari judul */
}


/* Caption muncul saat slide aktif */
#carouselBerita .carousel-item.active .carousel-caption {
    transform: translate(-50%, 0);       /* naik ke posisi normal */
    opacity: 1;
    transition-delay: 0.2s;              /* delay sedikit untuk efek dramatis */
}

/* Tombol carousel tetap klikable */
#carouselBerita .carousel-control-prev,
#carouselBerita .carousel-control-next {
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

.fh5co_suceefh5co_height {
    aspect-ratio: 16/9;
    overflow: hidden;
    position: relative;
}

.fh5co_suceefh5co_height img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Untuk mobile, gambar berita utama penuh tanpa terpotong */
@media (max-width: 767px) {
    .fh5co_suceefh5co_height {
        aspect-ratio: auto !important;
        height: auto !important;
    }

    .fh5co_suceefh5co_height img {
        width: 100% !important;
        height: auto !important;
        object-fit: contain !important;
        display: block;
    }

    .fh5co_suceefh5co_height_position_absolute_font {
        top: auto !important;
        bottom: 12px;
        left: 0 !important;
        height: auto !important;
        padding: 0 15px !important;
    }

    .bold-title {
        font-size: 1.1rem;
        margin-right: 0;
    }
}
/* Pagination normal */
.pagination .page-link {
    color: #000;
    border-color: #000;
    background-color: #fff;
}

/* Hover */
.pagination .page-link:hover {
    color: #fff;
    background-color: #000;
    border-color: #000;
}

/* Active page */
.pagination .page-item.active .page-link {
    color: #fff;
    background-color: #000;
    border-color: #000;
}

/* Disabled button */
.pagination .page-item.disabled .page-link {
    color: #777;
    border-color: #000;
    background-color: #f8f9fa;
}

</style>


<div class="container" style="padding-top: 40px; padding-bottom: 40px;">
    <div class="row g-1">
        {{-- Berita Utama --}}
        <div class="col-lg-6 col-md-12">
            @if($beritaUtama)
            <a href="{{ route('berita.show', $beritaUtama->slug) }}">
                <div class="fh5co_suceefh5co_height hover-zoom position-relative" style="overflow: hidden;">

                   <img src="{{ $beritaUtama->foto ? asset('storage/' . $beritaUtama->foto) : 'https://via.placeholder.com/800x400' }}" 
                    alt="{{ $beritaUtama->judul }}">


                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font">
                        <div style="pointer-events: none;">
                            <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
                            {{ \Carbon\Carbon::parse($beritaUtama->tanggal)->format('M d, Y') }}
                        </div>
                        <div class="bold-title" style="pointer-events: none;">
                            {{ $beritaUtama->judul }}
                        </div>
                    </div>

                </div>
            </a>
            @endif
        </div>

        {{-- Berita Kecil 2x2 --}}
        <div class="col-md-6">
            <div class="row g-1">
                @foreach($beritaKecil as $berita)
                    <div class="col-6">
                        <a href="{{ route('berita.show', $berita->slug) }}" class="fh5co_suceefh5co_height_2 hover-zoom d-block position-relative">
                            <img src="{{ $berita->foto ? asset('storage/' . $berita->foto) : 'https://via.placeholder.com/400x200' }}" 
                                class="fh5co_suceefh5co_height_2" alt="{{ $berita->judul }}"/>

                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div style="pointer-events: none;">
                                    <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->format('M d, Y') }}
                                </div>
                                <div class="judulberitakecil" style="pointer-events: none;">
                                    {{ $berita->judul }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4" style="position: relative; z-index: 50;">
    <div class="container">
        <h3 class="border-start border-4 border-primary ps-3 mb-4 fw-bold">Trending</h3>

        <div class="row g-3">
                   @foreach([$berita7, $berita8, $berita9, $berita10] as $berita)
                @if($berita)
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
                @endif
            @endforeach
        </div>
    </div>
</div>



    <div class="row">

        <!-- ===================== -->
        <!-- KONTEN KIRI -->
        <!-- ===================== -->
        <div class="col-lg-9">

            <!-- Karosel -->
            <div id="carouselBerita" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach([$berita1, $berita2, $berita3] as $index => $berita)
                        @if($berita)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <a href="{{ route('berita.show', $berita->slug) }}">
                                <img src="{{ $berita->foto ? asset('storage/' . $berita->foto) : 'https://via.placeholder.com/800x400' }}"
                                     class="d-block w-100 rounded"
                                     alt="{{ $berita->judul }}">

                                <div class="carousel-caption d-block">
                                    <h5 class="fw-bold">{{ $berita->judul }}</h5>
                                    <small class="text-light">
                                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('M d, Y') }}
                                    </small>
                                </div>
                            </a>
                        </div>
                        @endif
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselBerita" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselBerita" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            <!-- Business Section -->
            <span class="badge bg-dark text-white">Kategori Pencarian</span>
            <h2 class="mb-3 mt-0">Berita Lainnya</h2>

            <div class="mb-4">
                @foreach(['BANDA ACEH','MEDAN','PADANG','PEKANBARU','TANJUNG PINANG','MAKASSAR','SAMARINDA'] as $kota)
                    <button class="btn btn-outline-secondary btn-sm me-2 mb-2">{{ $kota }}</button>
                @endforeach
            </div>

{{-- BERITA LAINNYA --}}
<div class="row">
    @foreach($beritaLainnya as $berita)
        <div class="col-6 col-sm-6 col-md-6 col-lg-12 mb-4">
            <a href="{{ route('berita.show', $berita->slug) }}" class="text-decoration-none text-dark">

                <!-- Kartu Berita -->
                <div class="row g-3 h-100">

                    <!-- Gambar -->
                    <div class="col-12 col-md-4">
                        <div style="aspect-ratio:5/3; overflow:hidden;">
                            <img src="{{ $berita->foto ? asset('storage/' . $berita->foto) : 'https://via.placeholder.com/400x240' }}"
                                 class="img-fluid w-100 h-100" style="object-fit:cover;">
                        </div>
                    </div>

                    <!-- Teks -->
                    <div class="col-12 col-md-8 d-flex flex-column justify-content-between">
                        <h4 class="fw-bold">{{ $berita->judul }}</h4>
                        <small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('M d, Y') }}</small>
                        <p class="d-none d-md-block">{{ Str::limit($berita->isi, 120, '...') }}</p>
                    </div>

                </div>

            </a>

            <!-- Divider -->
            <div class="mt-3" style="width:75%; border-bottom:1px solid #555;"></div>
        </div>
    @endforeach
</div>

<!-- CSS opsional untuk line clamp agar teks isi rapi -->
<style>
p {
    display: -webkit-box;
    -webkit-line-clamp: 3; /* maksimal 3 baris */
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

{{-- ✅ PAGINATION (HARUS DI LUAR ROW) --}}
<nav class="d-flex justify-content-center mt-4">
   @if ($beritaLainnya->hasPages())
<nav class="d-flex justify-content-center mt-4">
    <ul class="pagination">

        {{-- Previous --}}
        @if ($beritaLainnya->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $beritaLainnya->previousPageUrl() }}">Previous</a>
            </li>
        @endif


        {{-- PAGE WINDOW (5 halaman saja) --}}
        @php
            $current = $beritaLainnya->currentPage();
            $last = $beritaLainnya->lastPage();

            $start = max($current - 2, 1);
            $end = min($start + 4, $last);
            $start = max($end - 4, 1);
        @endphp

        @for ($page = $start; $page <= $end; $page++)
            <li class="page-item {{ $page == $current ? 'active' : '' }}">
                <a class="page-link" href="{{ $beritaLainnya->url($page) }}">
                    {{ $page }}
                </a>
            </li>
        @endfor


        {{-- Next --}}
        @if ($beritaLainnya->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $beritaLainnya->nextPageUrl() }}">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
        @endif

    </ul>
</nav>
@endif
</nav>

</div> {{-- tutup col-lg-9 --}}    
        <!-- ===================== -->
        <!-- SIDEBAR KANAN -->
        <!-- ===================== -->
        <div class="col-lg-3">

            <div class="card border-0 shadow-sm" style="position:sticky; top:130px;">

                <div class="card-header bg-dark text-white">
                    <strong class="text-danger">Berita Terbaru</strong>
                </div>

                <div class="p-2">
                    @foreach(\App\Models\SidebarImage::latest()->take(1)->get() as $img)
                        <img src="{{ asset('storage/' . $img->gambar) }}"
                             class="img-fluid rounded mb-3"
                             alt="{{ $img->judul ?? 'Sidebar Image' }}">
                    @endforeach
    
                <!-- List berita terbaru -->
                <ul class="list-group list-group-flush">
                    @foreach(\App\Models\Berita::orderBy('tanggal','desc')->take(5)->get() as $b)
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

  <style>

    .carousel-caption {
        /* background: rgba(0, 0, 0, 0.45); */
        padding: 10px 15px;
        border-radius: 10px;
        bottom: 20px;
    }

    .carousel-caption h2{
        font-size: 1.1rem;
        margin-bottom: 5px;
    }
    #carouselBerita {
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
