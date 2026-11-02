<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>

<!-- Google tag (gtag.js) -->

<html lang="en" class="no-js">
<head>
    
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ME9L3JN80C"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-ME9L3JN80C');
        </script>
    
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

    @vite([
        'resources/css/media_query.css',
        'resources/css/bootstrap.css',
        'resources/css/animate.css',
        'resources/css/owl.carousel.css',
        'resources/css/owl.theme.default.css',
        'resources/css/style_1.css',
        'resources/js/modernizr-3.5.0.min.js',
        'resources/js/app.js'
    ])

    <style>
        #topHeader {
            width: 100%;
            position: relative;
            background: #ffffff;
        }

        #topHeader .logo-container {
            width: 100%;
            padding: 10px 0;
            text-align: center;
            background: #ffffff;
        }

        #topHeader .logo-container img {
            max-width: 300px;
            height: auto;
        }

        .berau-header {
            width: 100%;
            max-width: 1140px;
            margin: 0 auto 10px auto;
            padding: 0 15px;
            text-align: center;
        }

        .berau-header img {
            width: 100%;
            max-height: 280px;
            object-fit: contain;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 6px;
        }

        /* Navbar sticky: mengikuti alur dokumen (di bawah banner),
           lalu menempel ke atas viewport begitu banner sudah ter-scroll lewat */
        #stickyNavbar {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 9999;
            transition: box-shadow 0.3s ease;
        }

        #stickyNavbar.is-stuck {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .navbar-dark .nav-link {
            color: #fff !important;
            font-weight: 600;
        }

        .navbar-dark .nav-link:hover {
            color: #ffc107 !important;
        }

        footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div id="topHeader">
    <div class="logo-container">
        <img src="{{ asset('images/logouniversal.png') }}" alt="Universal Media" class="img-fluid">
    </div>

    <header class="berau-header">
        <img src="{{ asset('images/bontang-banner.jpeg') }}" alt="Banner Pemerintah Kota Bontang">
    </header>
</div>

<div id="stickyNavbar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUniversal" aria-controls="navbarUniversal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarUniversal">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'kriminalitas']) }}">Kriminal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'evergreen']) }}">Evergreen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'pemerintahan']) }}">Pemerintahan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'olahraga']) }}">Olahraga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'lifestyle']) }}">Lifestyle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('kategori.show', ['kategori' => 'Daerah']) }}">Daerah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<main class="container mt-5">
    @yield('content')
</main>

<footer style="background-color:#000; color:white; padding:30px 15px; margin-top:20px;">
    <div style="max-width:1100px; margin:auto; font-family:Arial, sans-serif; font-size:13px; line-height:1.6;">
        <h1 style="font-size:20px; font-weight:bold; margin-bottom:10px;">Susunan Redaksi</h1>
        <hr style="border:1px solid #fff; margin-bottom:20px;">

        <div style="display:flex; flex-wrap:wrap; gap:30px;">
            <div style="flex:1; min-width:250px;">
                <h3 style="font-size:16px;">Alamat Redaksi</h3>
                <p>
                    Jl. Pakis Hijau 8 Sempaja Utara,
                    Kec. Samarinda Utara,
                    Kota Samarinda,
                    Kalimantan Timur
                </p>
                <p>
                    Email:
                    <a href="mailto:universalmedia888888@gmail.com" style="color:white; text-decoration:none;">
                        universalmedia888888@gmail.com
                    </a>
                </p>
            </div>

            <div style="flex:1; min-width:250px;">
                <h3 style="font-size:16px;">Perusahaan</h3>
                <p><strong>PT. Media Arah Baru</strong></p>
                <p>Direktur Utama: <strong>Kayla Virrly Nurmafirah</strong></p>
                <p>Pemasaran: <strong>Mifta Libby Askangela</strong></p>
            </div>

            <div style="flex:1; min-width:250px;">
                <h3 style="font-size:16px;">Dewan Redaksi</h3>
                <p>Pemimpin Redaksi: <strong>Supiannur</strong></p>
                <p>Redaktur Pelaksana: <strong>Supiannur</strong></p>
                <p>Koordinator Liputan: <strong>Robert Anggiat</strong></p>
            </div>
        </div>
    </div>
</footer>


<script>
    // Opsional: menambahkan shadow pada navbar saat sudah menempel di atas
    const stickyNavbar = document.getElementById('stickyNavbar');
    const navbarOffsetTop = stickyNavbar.offsetTop;

    window.addEventListener('scroll', function () {
        if (window.pageYOffset > navbarOffsetTop) {
            stickyNavbar.classList.add('is-stuck');
        } else {
            stickyNavbar.classList.remove('is-stuck');
        }
    });
</script>

</body>
</html>
