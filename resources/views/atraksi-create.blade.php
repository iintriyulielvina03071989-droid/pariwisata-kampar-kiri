@extends('layouts.app')

@section('title', 'Tambah Atraksi')

@section('content')
<div class="container my-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('atraksi') }}">Atraksi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Atraksi</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h2 class="card-title mb-4">Tambah Atraksi Baru</h2>

                    <form action="{{ route('atraksi.store') }}" method="POST">
                        @csrf
<select name="destinasi_id" class="form-select @error('destinasi_id') is-invalid @enderror">
    <option value="" selected disabled>-- Pilih Destinasi --</option>
    @foreach ($destinasiList as $destinasi)
        <option value="{{ $destinasi->id }}"
            {{ old('destinasi_id') == $destinasi->id ? 'selected' : '' }}>
            {{ $destinasi->nama }}
        </option>
    @endforeach
</select>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Atraksi</label>
                            <input type="text" name="nama"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" rows="4"
                                      class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                                <option value="" selected disabled>-- Pilih Kategori --</option>
                                <option value="Budaya" {{ old('kategori') == 'Budaya' ? 'selected' : '' }}>Budaya</option>
                                <option value="Alam" {{ old('kategori') == 'Alam' ? 'selected' : '' }}>Alam</option>
                                <option value="Kuliner" {{ old('kategori') == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga (Rp)</label>
                            <input type="number" name="harga"
                                   class="form-control @error('harga') is-invalid @enderror"
                                   value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Isi 0 kalau gratis.</div>
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="form-label">Nama File Gambar</label>
                            <input type="text" name="gambar"
                                   class="form-control @error('gambar') is-invalid @enderror"
                                   value="{{ old('gambar') }}"
                                   placeholder="contoh: tari-zapin.jpg">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Atraksi</button>
                            <a href="{{ route('atraksi') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
