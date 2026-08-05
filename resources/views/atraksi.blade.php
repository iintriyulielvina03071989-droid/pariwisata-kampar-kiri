@extends('layouts.app')

@section('title', 'Daftar Atraksi')

@section('content')
<div class="container my-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Atraksi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Atraksi Wisata</h2>
        <a href="{{ route('atraksi.create') }}" class="btn btn-primary">+ Tambah Atraksi</a>
    </div>

    <div class="row g-4">
        @forelse ($atraksiList as $atraksi)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">{{ $atraksi->kategori }}</span>
                        <h5 class="card-title">{{ $atraksi->nama }}</h5>
                        <p class="card-text">{{ Str::limit($atraksi->deskripsi, 80) }}</p>
                        <p class="fw-bold">
                            {{ $atraksi->harga == 0 ? 'Gratis' : 'Rp ' . number_format($atraksi->harga, 0, ',', '.') }}
                        </p>

                        <div class="d-flex gap-2">
                            <a href="{{ route('atraksi.edit', $atraksi->id) }}" class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>
                            <form action="{{ route('atraksi.destroy', $atraksi->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus {{ $atraksi->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Belum ada atraksi yang ditambahkan.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
