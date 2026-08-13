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

        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
            <div>
                <h1 class="page-header-title">Destinasi Wisata Kampar Kiri</h1>
                <p class="page-header-subtitle mb-0">
                    Temukan pesona alam, sejarah, dan budaya yang tersebar di seluruh penjuru Kampar Kiri.
                </p>
            </div>

            @if(Auth::check() && Auth::user()->role === 'admin')
                <a href="{{ route('destinasi.create') }}" class="btn btn-hero-primary flex-shrink-0">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Destinasi
                </a>
            @endif
        </div>
    </div>
    <div class="destinasi-search-wrap">
        <form action="{{ route('destinasi') }}" method="GET">
            <div class="destinasi-search-box">
                <i class="bi bi-search"></i>
                <input type="text" name="cari" placeholder="Cari nama destinasi..." value="{{ $keyword ?? '' }}">
                <button type="submit">Cari</button>
            </div>
        </form>
    </div>
</section>

<section class="filter-section">
    <div class="d-flex flex-wrap gap-2 mb-4">
    <a href="{{ route('destinasi', array_filter(['cari' => $keyword])) }}"
       class="btn btn-sm rounded-pill {{ !$kategoriId ? 'btn-primary' : 'btn-outline-primary' }}">
        Semua
    </a>
    @foreach ($kategoriList as $kategori)
        <a href="{{ route('destinasi', array_filter(['cari' => $keyword, 'kategori' => $kategori->id])) }}"
           class="btn btn-sm rounded-pill {{ $kategoriId == $kategori->id ? 'btn-primary' : 'btn-outline-primary' }}">
            {{ $kategori->nama_kategori }}
        </a>
    @endforeach
</div>
</section>

<section class="destinasi-grid-section">
    <div class="container">
        <div class="row g-4">
        @forelse ($destinasiList as $destinasi)
            @php
                // Asumsi: kolom jam_buka & jam_tutup bertipe TIME (format "08:00:00")
                // Jika keduanya NULL, destinasi dianggap buka 24 jam.
                date_default_timezone_set("Asia/Jakarta");
                $jamSekarang = now()->format('H:i:s');
                $buka24Jam = is_null($destinasi->jam_buka) && is_null($destinasi->jam_tutup);
                $isBuka = $buka24Jam
                    ? true
                    : ($jamSekarang >= $destinasi->jam_buka && $jamSekarang < $destinasi->jam_tutup);
            @endphp
            <div class="col-md-6 col-lg-4">
                <div class="destinasi-full-card">
                    <div class="destinasi-full-card-img-wrap">
                        <img src="{{ $destinasi->gambar ? asset('storage/'.$destinasi->gambar) : asset('storage/default-destinasi.jpg') }}"
                             alt="{{ $destinasi->nama }}">
                        <span class="status-badge {{ $isBuka ? 'status-buka' : 'status-tutup' }}">
                            {{ $isBuka ? 'Sedang Buka' : 'Sudah Tutup' }}
                        </span>
                        

                    </div>
                    @if($destinasi->kategori)
                            <span class="badge bg-secondary">{{ $destinasi->kategori->nama_kategori }}</span>
                        @endif
                    <div class="destinasi-full-card-body">
                        <h5>{{ $destinasi->nama }}</h5>
                        <p class="destinasi-full-desc">
                            {{ Str::limit($destinasi->deskripsi, 100) }}
                        </p>
                        <div class="destinasi-full-meta">
                            <i class="bi bi-clock"></i>
                            @if ($buka24Jam)
                                Buka 24 Jam
                            @else
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $destinasi->jam_buka)->format('H:i') }} -
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $destinasi->jam_tutup)->format('H:i') }} WIB
                            @endif
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
        <div class="d-flex justify-content-center mt-4 destinasi-pagination-wrap">
            {{ $destinasiList->appends(['cari' => $keyword])->links('pagination::bootstrap-5') }}
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