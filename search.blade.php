@extends('layouts.app')

@section('title', 'Hasil Pencarian: ' . $keyword)

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
            <li class="breadcrumb-item active">Pencarian: {{ $keyword }}</li>
        </ol>
    </nav>

    <h1 class="mb-4"><i class="bi bi-search me-2"></i>Hasil Pencarian</h1>

    <div class="alert alert-info">
        <i class="bi bi-info-circle me-2"></i>
        Menampilkan hasil pencarian untuk keyword: <strong>"{{ $keyword }}"</strong>
        — Ditemukan <strong>{{ count($hasil) }}</strong> kategori.
    </div>

    @if (count($hasil) > 0)
        <div class="row g-4">
            @foreach ($hasil as $kategori)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="bi {{ $kategori['icon'] }} text-warning fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-0">
                                        {!! str_ireplace($keyword, '<mark>' . $keyword . '</mark>', e($kategori['nama'])) !!}
                                    </h5>
                                    <small class="text-muted">{{ $kategori['jumlah_buku'] }} buku</small>
                                </div>
                            </div>
                            <p class="card-text text-muted flex-grow-1">
                                {!! str_ireplace($keyword, '<mark>' . $keyword . '</mark>', e($kategori['deskripsi'])) !!}
                            </p>
                            <a href="{{ route('kategori.show', $kategori['id']) }}" class="btn btn-sm btn-outline-primary mt-auto">
                                <i class="bi bi-arrow-right me-1"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <i class="bi bi-emoji-frown fs-1 text-muted"></i>
            <h4 class="mt-3 text-muted">Tidak ada kategori yang cocok</h4>
            <p class="text-muted">Coba gunakan keyword yang berbeda.</p>
            <a href="{{ route('kategori.index') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar Kategori
            </a>
        </div>
    @endif
@endsection
