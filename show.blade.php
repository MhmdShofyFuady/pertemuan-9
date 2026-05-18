@extends('layouts.app')

@section('title', 'Detail Anggota - ' . $anggota['nama'])

@section('content')
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('anggota.index') }}">Anggota</a></li>
            <li class="breadcrumb-item active">{{ $anggota['nama'] }}</li>
        </ol>
    </nav>

    <h1 class="mb-4"><i class="bi bi-person-circle me-2"></i>Detail Anggota</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-person-badge me-2"></i>{{ $anggota['nama'] }}</h5>
                    @if ($anggota['status'] === 'Aktif')
                        <span class="badge bg-success fs-6">{{ $anggota['status'] }}</span>
                    @else
                        <span class="badge bg-danger fs-6">{{ $anggota['status'] }}</span>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th style="width: 200px;"><i class="bi bi-hash me-2"></i>Kode Anggota</th>
                            <td><code>{{ $anggota['kode'] }}</code></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-person me-2"></i>Nama Lengkap</th>
                            <td>{{ $anggota['nama'] }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-envelope me-2"></i>Email</th>
                            <td><a href="mailto:{{ $anggota['email'] }}">{{ $anggota['email'] }}</a></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-telephone me-2"></i>Telepon</th>
                            <td>{{ $anggota['telepon'] }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-geo-alt me-2"></i>Alamat</th>
                            <td>{{ $anggota['alamat'] }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-check-circle me-2"></i>Status</th>
                            <td>
                                @if ($anggota['status'] === 'Aktif')
                                    <span class="badge bg-success">{{ $anggota['status'] }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $anggota['status'] }}</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('anggota.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
