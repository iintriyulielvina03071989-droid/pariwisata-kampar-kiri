<?php
    date_default_timezone_set("Asia/Jakarta");
    $namaDaerah = "kampar kiri";

    $jamSekarang = date("H");
    if ($jamSekarang < 10) {
        $ucapan = "Selamat Pagi";
    } elseif ($jamSekarang < 15) {
        $ucapan = "Selamat Siang";
    } elseif ($jamSekarang < 18) {
        $ucapan = "Selamat Sore";
    } else {
        $ucapan = "Selamat Malam";
    }gitg
?>

@extends('layouts.app')

@section('title', 'Kampar Kiri - Beranda')

@section('content')

<section class="hero-section d-flex align-items-center">
    <div class="hero-overlay"></div>

    <div class="container position-relative text-center text-white">
        <span class="badge hero-badge mb-3">
            <i class="bi bi-geo-alt-fill me-1"></i>Riau, Indonesia
        </span>

        <?php
        ?>
        <h1 class="hero-title"><?php echo $ucapan; ?>, Selamat Datang di <?php echo $namaDaerah; ?></h1>

        <p class="hero-subtitle mx-auto">
            Temukan keindahan alam, budaya, dan kuliner khas daerah kami yang siap memanjakan setiap perjalanan Anda.
        </p>

        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="#destinasi" class="btn btn-hero-primary">
                Jelajahi Destinasi <i class="bi bi-arrow-right ms-1"></i>
            </a>
            <a href="#tentang" class="btn btn-hero-outline">
                Tentang Kami
            </a>
        </div>
    </div>

    <a href="#tentang" class="hero-scroll-down">
        <i class="bi bi-chevron-down"></i>
    </a>
</section>

<section class="about-section" id="tentang">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <div class="about-img-wrapper">
                    <img src="{{ asset('images/air-terjun-batu-dinding-kampar-kiri.webp') }}" alt="Kampar Kiri" class="about-img">
                    <div class="about-img-badge">
                        <i class="bi bi-award-fill"></i>
                        <span>Destinasi Unggulan Riau</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <span class="section-label">Tentang Kami</span>
                <h2 class="about-title">Mengenal Lebih Dekat Daerah Kami</h2>
                <p class="about-text">
                    Daerah ini dikenal dengan keindahan alamnya yang masih asri, dipadukan dengan kekayaan budaya lokal yang diwariskan turun-temurun. Berbagai destinasi wisata alam, sejarah, dan kuliner siap menyambut setiap wisatawan yang berkunjung.
                </p>

                <div class="about-feature-list">
                    <div class="about-feature-item">
                        <div class="about-feature-icon">
                            <i class="bi bi-tree-fill"></i>
                        </div>
                        <div>
                            <h6>Alam yang Asri</h6>
                            <p>Hutan, sungai, dan danau yang masih terjaga kelestariannya.</p>
                        </div>
                    </div>

                    <div class="about-feature-item">
                        <div class="about-feature-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div>
                            <h6>Budaya Melayu</h6>
                            <p>Tradisi dan kearifan lokal yang diwariskan turun-temurun.</p>
                        </div>
                    </div>

                    <div class="about-feature-item">
                        <div class="about-feature-icon">
                            <i class="bi bi-cup-hot-fill"></i>
                        </div>
                        <div>
                            <h6>Kuliner Khas</h6>
                            <p>Cita rasa autentik yang siap memanjakan lidah wisatawan.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="destinasi-preview" id="destinasi">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">Jelajahi</span>
            <h2 class="about-title">Destinasi Unggulan</h2>
        </div>

        <div class="row g-4">
            @forelse ($destinasiList as $destinasi)
                <?php
                    $jamBuka  = $destinasi->jam_buka ?? null;
                    $jamTutup = $destinasi->jam_tutup ?? null;
                    $statusBuka = ($jamBuka !== null && $jamTutup !== null)
                        ? ($jamSekarang >= (int) $jamBuka && $jamSekarang < (int) $jamTutup)
                        : true;
                ?>
                <div class="col-md-4">
                    <a href="{{ route('destinasi') }}" class="destinasi-card-link">
                        <div class="destinasi-card">
                            <img src="{{ asset('images/' . $destinasi->gambar) }}" alt="{{ $destinasi->nama }}">
                            <span class="status-badge {{ $statusBuka ? 'status-buka' : 'status-tutup' }}">
                                {{ $statusBuka ? 'Sedang Buka' : 'Sudah Tutup' }}
                            </span>
                            <div class="destinasi-overlay">
                                <h5>{{ $destinasi->nama }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada destinasi yang ditambahkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="contact-section" id="kontak">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">Hubungi Kami</span>
            <h2 class="about-title">Ada Pertanyaan? Kirimkan Pesan</h2>
        </div>

        <div class="contact-wrapper">
            <div class="row g-0">

                <div class="col-lg-5">
                    <div class="contact-info-panel">
                        <h4>Informasi Kontak</h4>
                        <p class="contact-info-desc">Kami siap membantu menjawab pertanyaan seputar wisata di daerah kami.</p>

                        <div class="contact-info-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <div>
                                <h6>Alamat</h6>
                                <p>Kampar Kiri, Riau, Indonesia</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <i class="bi bi-envelope-fill"></i>
                            <div>
                                <h6>Email</h6>
                                <p>info@wisatakampar.id</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <i class="bi bi-clock-fill"></i>
                            <div>
                                <h6>Jam Operasional</h6>
                                <p>Setiap Hari, 06.00 - 18.00 WIB</p>
                            </div>
                        </div>

                        <div class="social-icons mt-4">
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact-form-panel">
                        <form>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda">
                            </div>
                            <div class="mb-4">
                                <label for="pesan" class="form-label">Pesan</label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Tulis pesan Anda"></textarea>
                            </div>
                            <button type="submit" class="btn btn-contact-submit">
                                Kirim Pesan <i class="bi bi-send-fill ms-1"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection