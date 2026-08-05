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

        <form action="{{ route('destinasi.destroy', $destinasi->id) }}" method="POST"
      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
    @csrf
    @method('DELETE')
    <button type="submit">Hapus Destinasi</button>
</form>


        <h1 class="page-header-title">{{ $destinasi->nama }}</h1>
        <p class="page-header-subtitle">
            {{ $destinasi->deskripsi }}
        </p>
    </div>
</section>

<section class="detail-hero-image-section">
    <div class="container">
        <div class="detail-hero-image-wrap">
            <img src="{{ asset('images/' . $destinasi->gambar) }}" alt="{{ $destinasi->nama }}">
            <span class="status-badge {{ $isBuka ? 'status-buka' : 'status-tutup' }}">
                {{ $isBuka ? 'Sedang Buka' : 'Sudah Tutup' }}
            </span>
        </div>
    </div>
</section>

<section class="detail-info-section">
    <div class="container">
        <div class="detail-info-card">
            <div class="row g-4 text-center">

                <div class="col-6 col-md-3">
                    <div class="detail-info-item">
                        <i class="bi bi-tag-fill"></i>
                        <h6>Kategori</h6>
                        <p>Wisata Alam</p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
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

                <div class="col-6 col-md-3">
                    <div class="detail-info-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <h6>Lokasi</h6>
                        <p>{{ $destinasi->lokasi }}</p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="detail-info-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <h6>Status</h6>
                        <p>{{ $isBuka ? 'Sedang Buka' : 'Sudah Tutup' }}</p>
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
</section>

@endsection