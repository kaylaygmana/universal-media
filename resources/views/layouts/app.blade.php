<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Universal Media')</title>

<meta name="description" content="@yield('meta_description', 'Portal berita Universal Media')">

<meta property="og:type" content="article">
<meta property="og:site_name" content="Universal Media">
<meta property="og:title" content="@yield('og_title', 'Universal Media')">
<meta property="og:description" content="@yield('og_description', 'Portal berita Universal Media')">
<meta property="og:image" content="@yield('og_image', asset('images/logokocik.png'))">
<meta property="og:url" content="{{ url()->current() }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('og_title', 'Universal Media')">
<meta name="twitter:description" content="@yield('og_description', 'Portal berita Universal Media')">
<meta name="twitter:image" content="@yield('og_image', asset('images/logokocik.png'))">
    <link rel="icon" href="{{ asset('images/logokocik.png') }}" type="image/png">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite([
        'resources/css/media_query.css',
        'resources/css/bootstrap.css',
        'resources/css/animate.css',
        'resources/css/owl.carousel.css',
        'resources/css/owl.theme.default.css',
        'resources/css/style_1.css',
        'resources/js/modernizr-3.5.0.min.js',
        'resources/js/jquery.min.js',
        'resources/js/app.js'
    ])

    <style>
        #stickyHeader {
            transition: top 0.3s;
        }

        main.container {
            padding-top: 180px;
        }

        .navbar-dark .nav-link {
            color: #fff !important;
            font-weight: 600;
        }

        .navbar-dark .nav-link:hover {
            color: #ffc107 !important;
        }
    </style>
</head>

<body>

<!-- HEADER -->
<div id="stickyHeader" style="position: fixed; top: 0; width: 100%; z-index: 999; background: #ffffff;">

    <!-- LOGO -->
    <div class="container py-2 text-center">
        <img src="{{ asset('images/logouniversal.png') }}" alt="Universal Media" width="300" class="img-fluid">
    </div>

  <!-- NAVBAR RESPONSIVE -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <!-- TOGGLER DI KIRI -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUniversal">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarUniversal">
            <ul class="navbar-nav mx-auto text-center">

                <li class="nav-item">
                    <a class="nav-link px-3" href="/">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'kriminalitas']) }}">
                        Kriminal
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'evergreen']) }}">
                        Evergreen
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'pemerintahan']) }}">
                        Pemerintahan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'olahraga']) }}">
                        Olahraga
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'lifestyle']) }}">
                        Lifestyle
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'Daerah']) }}">
                        Daerah
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'Daerah']) }}">
                        Daerah
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

</div>

<!-- CONTENT -->
<main class="container mt-5 pt-5">
    @yield('content')
</main>

<!-- FOOTER -->
<footer style="background-color:#000; color:white; padding:30px 15px; margin-top:20px;">

    <div style="max-width:1100px; margin:auto; font-family:Arial, sans-serif; font-size:13px; line-height:1.6;">

        <h1 style="font-size:20px; font-weight:bold; margin-bottom:10px;">Susunan Redaksi</h1>
        <hr style="border:1px solid #fff; margin-bottom:20px;">

        <div style="display:flex; flex-wrap:wrap; gap:30px;">

            <!-- Kolom 1 -->
           <div style="flex:1; min-width:250px;">
            <h3 style="font-size:16px;">Alamat Redaksi</h3>
            <p>Jl. Pakis Hijau 8 Sempaja Utara, Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur</p>

            <p>
                Email: 
                <a href="mailto:universalmedia888888@gmail.com" style="color:white; text-decoration:none;">
                    universalmedia888888@gmail.com
                </a>
            </p>
        </div>

            <!-- Kolom 2 -->
            <div style="flex:1; min-width:250px;">
                <h3 style="font-size:16px;">Perusahaan</h3>
                <p><strong>PT. Media Arah Baru</strong></p>

                <p>Direktur Utama: <strong>Kayla Virrly Nurmafirah</strong></p>
                <p>Pemasaran: <strong>Mifta Libby Askangela</strong></p>
                {{-- <p>Penasehat Hukum: <strong>Adv. Bambang Widjanarko, SH, CIL, CP</strong></p> --}}
            </div>

            <!-- Kolom 3 -->
            <div style="flex:1; min-width:250px;">
                <h3 style="font-size:16px;">Dewan Redaksi</h3>
                <p>Pemimpin Redaksi: <strong>Supiannur</strong></p>
                {{-- <p>(14567-PWI/WU/DP/V/2023/28/04/88)</p> --}}

                <p>Redaktur Pelaksana: <strong>Aspiannur</strong></p>
                <p>Koordinator Liputan: <strong>Supiannur</strong></p>
            </div>

        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    let lastScrollTop = 0;
    const header = document.getElementById('stickyHeader');

    window.addEventListener('scroll', function() {
        let st = window.pageYOffset || document.documentElement.scrollTop;
        if (st > lastScrollTop){
            header.style.top = '-140px';
        } else {
            header.style.top = '0';
        }
        lastScrollTop = st <= 0 ? 0 : st;
    }, false);
</script>

</body>
</html>
