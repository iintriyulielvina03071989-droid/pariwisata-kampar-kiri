@extends('layouts.app')

@section('title', 'Kampar Kiri - Kontak')

@section('content')

<section class="page-header-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb page-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kontak</li>
            </ol>
        </nav>

        <h1 class="page-header-title">Hubungi Kami</h1>
        <p class="page-header-subtitle">
            Ada pertanyaan seputar wisata Kampar Kiri? Kirimkan pesan Anda, tim kami siap membantu.
        </p>
    </div>
</section>

<section class="contact-section">
    <div class="container">
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
                                <p>Setiap Hari, 08.00 - 16.00 WIB</p>
                            </div>
                        </div>

                        <div class="social-icons mt-4">
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.facebook.com/share/1DEaqmKaHh/"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                            <a href="#"><i class="bi bi-tiktok"></i></a>

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