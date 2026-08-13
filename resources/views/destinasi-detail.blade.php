@extends('layouts.app')

@section('title', $destinasi->nama . '- Destinasi')

@section('content')

@php
    date_default_timezone_set("Asia/Jakarta");
    $jamSekarang = now()->format('H:i:s');
    $buka24Jam = is_null($destinasi->jam_buka) && is_null($destinasi->jam_tutup);
    $isBuka = $buka24Jam
        ? true
        : ($jamSekarang >= $destinasi->jam_buka && $jamSekarang < $destinasi->jam_tutup);
@endphp

<section class="page-header-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb page-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('destinasi') }}">Destinasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $destinasi->nama }}</li>
            </ol>
        </nav>

        @if($destinasi->kategori)
            <span class="badge bg-secondary">{{ $destinasi->kategori->nama_kategori }}</span>
        @endif


        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
            <div>
                <h1 class="page-header-title">{{ $destinasi->nama }}</h1>
                <p class="page-header-subtitle mb-0">
                    {{ $destinasi->deskripsi }}
                </p>
            </div>

            @if(Auth::check() && Auth::user()->role === 'admin')
                <div class="destinasi-detail-actions flex-shrink-0">
                    <a href="{{ route('destinasi.edit', $destinasi->id) }}" class="btn btn-edit-destinasi">
                        <i class="bi bi-pencil-fill me-1"></i> Edit
                    </a>
                    <form action="{{ route('destinasi.destroy', $destinasi->id) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-hapus-destinasi">
                            <i class="bi bi-trash-fill me-1"></i> Hapus
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</section>

<section class="detail-hero-image-section">
    <div class="container">
        <div class="detail-hero-image-wrap">
            <img src="{{ asset('storage/' . $destinasi->gambar) }}" alt="{{ $destinasi->nama }}">
            <span class="status-badge {{ $isBuka ? 'status-buka' : 'status-tutup' }}">
                {{ $isBuka ? 'Sedang Buka' : 'Sudah Tutup' }}
            </span>
        </div>
    </div>
</section>

<section class="detail-info-section">
    <div class="container">
        <div class="detail-info-card">
            <div class="row g-4 text-center row-cols-2 row-cols-md-5">

                <div class="col">
                    <div class="detail-info-item">
                        <i class="bi bi-tag-fill"></i>
                        <h6>Kategori</h6>
                        <p>Wisata Alam</p>
                    </div>
                </div>

                <div class="col">
                    <div class="detail-info-item">
                        <i class="bi bi-clock-fill"></i>
                        <h6>Jam Operasional</h6>
                        <p>
                            @if ($buka24Jam)
                                Buka 24 Jam
                            @else
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $destinasi->jam_buka)->format('H:i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $destinasi->jam_tutup)->format('H:i') }} WIB
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col">
                    <div class="detail-info-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <h6>Lokasi</h6>
                        <p>{{ $destinasi->lokasi }}</p>
                    </div>
                </div>

                <div class="col">
                    <div class="detail-info-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <h6>Status</h6>
                        <p>{{ $isBuka ? 'Sedang Buka' : 'Sudah Tutup' }}</p>
                    </div>
                </div>

                <div class="col">
                    <div class="detail-info-item detail-info-item-highlight">
                        <i class="bi bi-ticket-perforated-fill"></i>
                        <h6>Harga Tiket</h6>
                        <p>{{ $destinasi->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($destinasi->harga_tiket, 0, ',', '.') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="detail-desc-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <span class="section-label">Tentang Destinasi</span>
                <h2 class="about-title">{{$destinasi->nama}}</h2>
                <p class="about-text">
                    {{$destinasi->deskripsi}}
                </p>
                <p class="about-text">
                    Selain menikmati keindahan air terjun, pengunjung juga dapat bersantai di area sekitar yang tertata rapi, berfoto di beberapa spot menarik, atau sekadar menikmati suara gemericik air sambil beristirahat di gazebo yang tersedia.
                </p>
                <p class="about-text mb-0">
                    Akses menuju lokasi cukup mudah dijangkau dengan kendaraan roda dua maupun roda empat, dengan jalan yang sudah cukup baik hingga area parkir.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="fasilitas-section">
    <div class="container">
        <span class="section-label">Kenyamanan Anda</span>
        <h2 class="about-title mb-4">Fasilitas Tersedia</h2>

        <div class="row g-3">

            <div class="col-6 col-md-3">
                <div class="fasilitas-item">
                    <i class="bi bi-p-square-fill"></i>
                    <p>Area Parkir</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="fasilitas-item">
                    <i class="bi bi-cup-hot-fill"></i>
                    <p>Warung Makan</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="fasilitas-item">
                    <i class="bi bi-house-door-fill"></i>
                    <p>Gazebo</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="fasilitas-item">
                    <i class="bi bi-droplet-fill"></i>
                    <p>Toilet & Kamar Mandi</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="tips-section">
    <div class="container">
        <span class="section-label">Persiapan Anda</span>
        <h2 class="about-title mb-4">Tips Berkunjung</h2>

        <div class="tips-list">
            <div class="tips-item">
                <i class="bi bi-check-circle-fill"></i>
                <p>Datang di pagi hari untuk suasana yang lebih sejuk dan tidak terlalu ramai.</p>
            </div>
            <div class="tips-item">
                <i class="bi bi-check-circle-fill"></i>
                <p>Gunakan alas kaki yang tidak licin karena area sekitar cenderung basah.</p>
            </div>
            <div class="tips-item">
                <i class="bi bi-check-circle-fill"></i>
                <p>Bawa pakaian ganti jika berencana bermain air.</p>
            </div>
            <div class="tips-item">
                <i class="bi bi-check-circle-fill"></i>
                <p>Jaga kebersihan lingkungan dengan tidak membuang sampah sembarangan.</p>
            </div>
        </div>
    </div>
</section>

<section class="lokasi-section">
    <div class="container">
        <span class="section-label">Cara Menuju Lokasi</span>
        <h2 class="about-title mb-4">Lokasi & Peta</h2>

        <div class="lokasi-map-wrap">
            <iframe
                src="https://www.google.com/maps?q={{ urlencode($destinasi->lokasi) }}&output=embed"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
<div class="detail-ulasan mt-5">
    <span class="section-eyebrow">&#9670; Kata Pengunjung</span>
    <h2 class="section-title">Ulasan Pengunjung</h2>

    @forelse ($destinasi->ulasan as $ulasan)
        <div class="card mb-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <strong>{{ $ulasan->user->name }}</strong>
                    <span class="badge bg-warning text-dark">{{ $ulasan->rating }} / 5</span>
                </div>
                <p class="mb-0">{{ $ulasan->komentar }}</p>
            </div>
        </div>
    @empty
        <p class="text-muted">Belum ada ulasan untuk destinasi ini.</p>
    @endforelse

    <a href="{{ route('ulasan.create', $destinasi->id) }}" class="btn btn-outline-primary mt-2">
        Tulis Ulasan
    </a>
</div>


   <div class="detail-atraksi mt-5">
    <h2 class="section-title">Atraksi di Destinasi Ini</h2>
    <div class="row g-3">
        @forelse ($destinasi->atraksi as $atraksi)
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $atraksi->gambar) }}" class="card-img-top">
                    <div class="card-body">
                        <h6 class="card-title">{{ $atraksi->nama }}</h6>
                        <span class="badge bg-secondary">{{ $atraksi->kategori }}</span>
                    </div>

                    <div class="mt-2">
    <button type="button" class="btn btn-sm btn-outline-primary"
            data-bs-toggle="modal" data-bs-target="#modalAtraksi{{ $atraksi->id }}">
        Lihat Detail
    </button>
</div>

<!-- Modal Detail Atraksi -->
<div class="modal fade" id="modalAtraksi{{ $atraksi->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $atraksi->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $atraksi->gambar) }}" class="img-fluid rounded mb-3" alt="{{ $atraksi->nama }}">
                <span class="badge bg-secondary mb-2">{{ $atraksi->kategori }}</span>
                <p class="fw-bold">Rp {{ number_format($atraksi->harga, 0, ',', '.') }}</p>
                <p>{{ $atraksi->deskripsi }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada atraksi untuk destinasi ini.</p>
        @endforelse
    </div>
</div>
 
</section>

@endsection