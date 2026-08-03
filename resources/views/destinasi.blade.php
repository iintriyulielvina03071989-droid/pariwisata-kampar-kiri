@extends('layouts.app')

@section('title', 'Kampar Kiri - Destinasi')

@section('content')

<section class="page-header-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb page-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Destinasi</li>
            </ol>
        </nav>

        <h1 class="page-header-title">Destinasi Wisata Kampar Kiri</h1>
        <p class="page-header-subtitle">
            Temukan pesona alam, sejarah, dan budaya yang tersebar di seluruh penjuru Kampar Kiri.
        </p>
    </div>
</section>

<section class="filter-section">
    <div class="container">
        <ul class="nav filter-tabs justify-content-center flex-wrap">
            <li class="nav-item">
                <a class="nav-link filter-tab active" href="#">Semua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-tab" href="#">Wisata Alam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-tab" href="#">Wisata Sejarah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-tab" href="#">Wisata Air</a>
            </li>
        </ul>
    </div>
</section>

<section class="destinasi-grid-section">
    <div class="container">
        <div class="row g-4">
        @forelse ($destinasiList as $destinasi)
            @php
                // Asumsi: kolom jam_buka & jam_tutup bertipe TIME (format "08:00:00")
                // Sesuaikan nama kolom di bawah kalau di migration/model kamu berbeda.
                date_default_timezone_set("Asia/Jakarta");
                $jamSekarang = now()->format('H:i:s');
                $isBuka = $jamSekarang >= $destinasi->jam_buka && $jamSekarang < $destinasi->jam_tutup;
            @endphp
            <div class="col-md-6 col-lg-4">
                <div class="destinasi-full-card">
                    <div class="destinasi-full-card-img-wrap">
                        <img src="{{ $destinasi->gambar ? asset('images/'.$destinasi->gambar) : asset('images/default-destinasi.jpg') }}"
                             alt="{{ $destinasi->nama }}">
                        <span class="status-badge {{ $isBuka ? 'status-buka' : 'status-tutup' }}">
                            {{ $isBuka ? 'Sedang Buka' : 'Sudah Tutup' }}
                        </span>
                        <span class="category-badge">{{ $destinasi->kategori }}</span>
                    </div>
                    <div class="destinasi-full-card-body">
                        <h5>{{ $destinasi->nama }}</h5>
                        <p class="destinasi-full-desc">
                            {{ Str::limit($destinasi->deskripsi, 100) }}
                        </p>
                        <div class="destinasi-full-meta">
                            <i class="bi bi-clock"></i>
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $destinasi->jam_buka)->format('H:i') }} -
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $destinasi->jam_tutup)->format('H:i') }} WIB
                        </div>
                        <a href="{{ route('destinasi.detail', $destinasi->id) }}" class="btn btn-detail-card">
                            Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="mb-0">Belum ada destinasi yang tersedia saat ini.</p>
            </div>
        @endforelse
        </div>
    </div>
</section>

<section class="destinasi-cta-section">
    <div class="container text-center">
        <h3 class="destinasi-cta-title">Masih Bingung Mau Mulai Dari Mana?</h3>
        <p class="destinasi-cta-text">
            Tim kami siap membantu merencanakan kunjungan wisata Anda ke Kampar Kiri.
        </p>
        <a href="{{ url('/#kontak') }}" class="btn btn-hero-primary">
            Hubungi Kami <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
</section>

@endsection