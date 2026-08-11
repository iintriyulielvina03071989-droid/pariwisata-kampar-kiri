<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kabupaten Siak - Wisata')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <svg width="32" height="32" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="me-2" style="vertical-align:-8px;" role="img">
  <title>Logo Wisata Kampar Kiri</title>
  <defs>
    <clipPath id="badgeClip"><circle cx="50" cy="50" r="47"/></clipPath>
    <linearGradient id="skyGrad" x1="0" y1="0" x2="0" y2="1">
      <stop offset="0%" stop-color="#BEE3F0"/>
      <stop offset="100%" stop-color="#E9F6FB"/>
    </linearGradient>
  </defs>
  <g clip-path="url(#badgeClip)">
    <rect x="0" y="0" width="100" height="100" fill="url(#skyGrad)"/>
    <circle cx="72" cy="28" r="14" fill="#F4C430" opacity="0.35"/>
    <circle cx="72" cy="28" r="9" fill="#F7B733"/>
    <path d="M0 62 Q 20 40 40 55 T 80 50 Q 90 46 100 55 L100 100 L0 100 Z" fill="#7FB069"/>
    <path d="M0 75 Q 25 55 50 70 T 100 65 L100 100 L0 100 Z" fill="#4C7A3D"/>
    <g fill="#2F5233">
      <path d="M22 62 L27 72 L17 72 Z"/>
      <path d="M22 58 L26 66 L18 66 Z"/>
      <path d="M60 58 L65 68 L55 68 Z"/>
      <path d="M60 54 L64 61 L56 61 Z"/>
      <path d="M82 60 L86 68 L78 68 Z"/>
    </g>
    <path d="M0 85 Q 25 78 50 86 T 100 84 L100 100 L0 100 Z" fill="#4A90C4"/>
    <path d="M0 88 Q 25 82 50 89 T 100 87" fill="none" stroke="#BEE3F0" stroke-width="1.5" stroke-linecap="round"/>
  </g>
  <circle cx="50" cy="50" r="47" fill="none" stroke="#2F5233" stroke-width="2.5"/>
</svg>Kampar Kiri
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('destinasi') ? 'active' : '' }}" href="{{ route('destinasi') }}">Destinasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}" href="{{ route('tentang') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                </li>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light btn-sm">Daftar</a>
                @else
                    <div class="dropdown">
                        <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        href="#" data-bs-toggle="dropdown">
                            <span class="rounded-circle bg-light text-dark d-flex align-items-center justify-content-center fw-bold"
                                style="width:32px;height:32px;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><span class="dropdown-item-text fw-bold">{{ Auth::user()->name }}</span></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-col">
    <h4 class="fw-bold mb-3">
        <span class="d-inline-flex align-items-center bg-success text-white px-3 py-2 rounded">
            <svg width="28" height="28" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="me-2" role="img">
                <title>Logo Wisata Kampar Kiri</title>
                <defs>
                    <clipPath id="badgeClip"><circle cx="50" cy="50" r="47"/></clipPath>
                    <linearGradient id="skyGrad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#BEE3F0"/>
                        <stop offset="100%" stop-color="#E9F6FB"/>
                    </linearGradient>
                </defs>
                <g clip-path="url(#badgeClip)">
                    <rect x="0" y="0" width="100" height="100" fill="url(#skyGrad)"/>
                    <circle cx="72" cy="28" r="14" fill="#F4C430" opacity="0.35"/>
                    <circle cx="72" cy="28" r="9" fill="#F7B733"/>
                    <path d="M0 62 Q 20 40 40 55 T 80 50 Q 90 46 100 55 L100 100 L0 100 Z" fill="#7FB069"/>
                    <path d="M0 75 Q 25 55 50 70 T 100 65 L100 100 L0 100 Z" fill="#4C7A3D"/>
                    <g fill="#2F5233">
                        <path d="M22 62 L27 72 L17 72 Z"/>
                        <path d="M22 58 L26 66 L18 66 Z"/>
                        <path d="M60 58 L65 68 L55 68 Z"/>
                        <path d="M60 54 L64 61 L56 61 Z"/>
                        <path d="M82 60 L86 68 L78 68 Z"/>
                    </g>
                    <path d="M0 85 Q 25 78 50 86 T 100 84 L100 100 L0 100 Z" fill="#4A90C4"/>
                    <path d="M0 88 Q 25 82 50 89 T 100 87" fill="none" stroke="#BEE3F0" stroke-width="1.5" stroke-linecap="round"/>
                </g>
                <circle cx="50" cy="50" r="47" fill="none" stroke="#2F5233" stroke-width="2.5"/>
            </svg>
            Kampar Kiri
        </span>
    </h4>
    <p>Jelajahi pesona alam dan budaya Melayu di jantung Kabupaten Kampar, Riau.</p>
</div>

        <div class="footer-col">
            <h4>Tautan Cepat</h4>
            <ul>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="#">Destinasi</a></li>
                <li><a href="#">Tentang</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Hubungi Kami</h4>
            <p><i class="bi bi-geo-alt-fill me-2"></i>Kampar Kiri, Riau, Indonesia</p>
            <p><i class="bi bi-envelope-fill me-2"></i>info@wisatakampar.id</p>
            <div class="social-icons mt-2">
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="https://www.facebook.com/share/1DEaqmKaHh/"><i class="bi bi-facebook"></i></a>
                <a href="https://wa.me/message/XBRLFDARQ2O5N1"><i class="bi bi-whatsapp"></i></a>
                <a href="#"><i class="bi bi-tiktok"></i></a>
            </div>
        </div>
    </div>

    <p class="footer-copy">&copy; {{ date('Y') }} Kampar Kiri. All rights reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>