@extends('layouts.app')

@section('title', 'Daftar Anggota Perpustakaan')

@section('content')
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Anggota</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0"><i class="bi bi-people-fill me-2"></i>Daftar Anggota Perpustakaan</h1>
        <span class="badge bg-primary fs-6">{{ count($anggota_list) }} Anggota</span>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Kode Anggota</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota_list as $index => $anggota)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><code>{{ $anggota['kode'] }}</code></td>
                                <td>{{ $anggota['nama'] }}</td>
                                <td>{{ $anggota['email'] }}</td>
                                <td>
                                    @if ($anggota['status'] === 'Aktif')
                                        <span class="badge bg-success">{{ $anggota['status'] }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ $anggota['status'] }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('anggota.show', $anggota['id']) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
