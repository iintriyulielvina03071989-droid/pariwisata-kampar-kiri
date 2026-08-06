@extends('layouts.app')

@section('title', 'Kampar Kiri - Tentang')

@section('content')

<section class="page-header-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb page-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tentang</li>
            </ol>
        </nav>

        <h1 class="page-header-title">Tentang Kampar Kiri</h1>
        <p class="page-header-subtitle">
            Mengenal lebih jauh sejarah, kekayaan alam, dan budaya yang menjadikan daerah kami istimewa.
        </p>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <div class="about-img-wrapper">
                    <img src="{{ asset('images/batu tilam.jpg') }}" alt="Kampar Kiri" class="about-img">
                    <div class="about-img-badge">
                        <i class="bi bi-clock-history"></i>
                        <span>Kaya Sejarah & Budaya</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <span class="section-label">Sejarah Kami</span>
                <h2 class="about-title">Jejak Panjang Kampar Kiri</h2>
                <p class="about-text">
                    Jejak panjang Kampar Kiri mencakup sejarah peradaban tua, pusat perdagangan rempah dunia, serta pusat kekuasaan. Wilayah di sepanjang aliran Sungai Kampar Kiri ini menyimpan warisan kebudayaan Melayu yang kuat, situs-situs arkeologi religi, dan peninggalan monarki masa lalu.
                </p>
                <p class="about-text">
                    Selain menyimpan nilai sejarah, daerah ini juga dikaruniai bentang alam yang memukau — mulai dari perbukitan hijau, aliran sungai, hingga danau yang menjadi sumber kehidupan masyarakat setempat selama bergenerasi.
                </p>
            </div>

        </div>
    </div>
</section>

<section class="visi-misi-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">Arah Kami</span>
            <h2 class="about-title">Visi & Misi</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="visi-misi-card">
                    <div class="visi-misi-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <h5>Visi</h5>
                    <p>
                        Mengacu pada visi daerah Kabupaten Kampar yaitu terwujudnya wilayah yang maju, berdaya saing, agamis, dan sejahtera.Menjadikan kawasan potensi alam dan sungai di wilayah Kampar Kiri sebagai destinasi wisata unggulan yang berbasis kerakyatan dan daya saing global.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="visi-misi-card">
                    <div class="visi-misi-icon">
                        <i class="bi bi-flag-fill"></i>
                    </div>
                    <h5>Misi</h5>
                    <ul class="visi-misi-list">
                        <li>Mengembangkan kawasan pariwisata yang terpadu dengan mengedepankan kekuatan sosial budaya dan kearifan lokal masyarakat tempatan.</li>
                        <li>Meningkatkan pembangunan dan penyediaan infrastruktur pendukung pariwisata secara profesional dan berkelanjutan.</li>
                        <li>Mendorong pertumbuhan ekonomi kerakyatan melalui optimalisasi daya tarik wisata alam dan sejarah lokal di kawasan Kampar Kiri.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="statistik-section">
    <div class="container">
        <div class="row g-4 text-center">

            <div class="col-6 col-lg-3">
                <div class="statistik-card">
                    <i class="bi bi-signpost-split-fill"></i>
                    <h3>20</h3>
                    <p>Koto/Kampung Tua</p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="statistik-card">
                    <i class="bi bi-map-fill"></i>
                    <h3>±1.149,79 km²</h3>
                    <p>Luas Wilayah</p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="statistik-card">
                    <i class="bi bi-geo-alt-fill"></i>
                    <h3>10+</h3>
                    <p>Destinasi Wisata</p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="statistik-card">
                    <i class="bi bi-people-fill"></i>
                    <h3>±30.676</h3>
                    <p>Jumlah Penduduk</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="budaya-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">Warisan Kami</span>
            <h2 class="about-title">Keunikan Budaya & Adat</h2>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-4">
                <div class="budaya-card">
                    <div class="budaya-card-img-wrap">
                        <img src="{{ asset('images/adat_istiadat.jpg') }}" alt="Adat Istiadat Melayu">
                    </div>
                    <div class="budaya-card-body">
                        <h5>Adat Istiadat Melayu</h5>
                        <p>Tradisi musyawarah adat dan tata krama yang masih dijunjung tinggi dalam kehidupan sehari-hari masyarakat.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="budaya-card">
                    <div class="budaya-card-img-wrap">
                        <img src="{{ asset('images/Alat Musik Kampar.jpg') }}" alt="Kesenian Tradisional">
                    </div>
                    <div class="budaya-card-body">
                        <h5>Kesenian Tradisional</h5>
                        <p>Tari dan musik tradisional yang rutin ditampilkan pada acara-acara adat dan penyambutan tamu.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="budaya-card">
                    <div class="budaya-card-img-wrap">
                        <img src="{{ asset('images/kuliner_khas_makan_bajambau.jpeg') }}" alt="Kuliner Khas">
                    </div>
                    <div class="budaya-card-body">
                        <h5>Kuliner Khas</h5>
                        <p>Ragam masakan khas yang diwariskan turun-temurun, jadi daya tarik tersendiri bagi wisatawan.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection