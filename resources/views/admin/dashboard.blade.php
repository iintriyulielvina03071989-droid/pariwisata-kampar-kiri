@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<div class="mb-4">
    <h4 class="fw-bold mb-1" style="color:#0D2818;">Halo, {{ Auth::user()->name }} 👋</h4>
    <p class="text-muted mb-0">Berikut ringkasan data wisata Kampar Kiri hari ini.</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-card-icon" style="background:rgba(27,67,50,0.1); color:#1B4332;">
                <i class="bi bi-geo-alt-fill"></i>
            </div>
            <div class="stat-card-value">{{ $totalDestinasi }}</div>
            <div class="stat-card-label">Total Destinasi</div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-card-icon" style="background:rgba(212,175,55,0.18); color:#B8860B;">
                <i class="bi bi-stars"></i>
            </div>
            <div class="stat-card-value">{{ $totalAtraksi }}</div>
            <div class="stat-card-label">Total Atraksi</div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-card-icon" style="background:rgba(13,110,253,0.1); color:#0d6efd;">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="stat-card-value">{{ $totalUser }}</div>
            <div class="stat-card-label">Total User</div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-card-icon" style="background:rgba(220,53,69,0.1); color:#dc3545;">
                <i class="bi bi-chat-square-text-fill"></i>
            </div>
            <div class="stat-card-value">{{ $totalUlasan }}</div>
            <div class="stat-card-label">Total Ulasan</div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <a href="{{ route('destinasi') }}" class="quick-action-card">
            <i class="bi bi-geo-alt-fill"></i>
            <div>
                <h6>Kelola Destinasi</h6>
                <p>Tambah, edit, atau hapus data destinasi wisata.</p>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('atraksi') }}" class="quick-action-card">
            <i class="bi bi-stars"></i>
            <div>
                <h6>Kelola Atraksi</h6>
                <p>Atur daftar atraksi yang tersedia untuk wisatawan.</p>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('user') }}" class="quick-action-card">
            <i class="bi bi-people-fill"></i>
            <div>
                <h6>Kelola User</h6>
                <p>Kelola akun pengguna dan hak akses admin.</p>
            </div>
        </a>
    </div>
</div>

@endsection