<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\KategoriController;

// ==========================================
// HOME
// ==========================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ==========================================
// TUGAS 1: ANGGOTA (Routing + View)
// ==========================================
Route::get('/anggota', function () {
    $anggota_list = [
        [
            'id' => 1,
            'kode' => 'AGT-001',
            'nama' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'telepon' => '081234567890',
            'alamat' => 'Jakarta',
            'status' => 'Aktif'
        ],
        [
            'id' => 2,
            'kode' => 'AGT-002',
            'nama' => 'Siti Aminah',
            'email' => 'siti@email.com',
            'telepon' => '081298765432',
            'alamat' => 'Bandung',
            'status' => 'Aktif'
        ],
        [
            'id' => 3,
            'kode' => 'AGT-003',
            'nama' => 'Andi Nugroho',
            'email' => 'andi@email.com',
            'telepon' => '085612345678',
            'alamat' => 'Surabaya',
            'status' => 'Tidak Aktif'
        ],
        [
            'id' => 4,
            'kode' => 'AGT-004',
            'nama' => 'Rina Wijaya',
            'email' => 'rina@email.com',
            'telepon' => '087812349876',
            'alamat' => 'Yogyakarta',
            'status' => 'Aktif'
        ],
        [
            'id' => 5,
            'kode' => 'AGT-005',
            'nama' => 'Dedi Santoso',
            'email' => 'dedi@email.com',
            'telepon' => '089912341234',
            'alamat' => 'Semarang',
            'status' => 'Aktif'
        ],
    ];

    return view('anggota.index', compact('anggota_list'));
})->name('anggota.index');

Route::get('/anggota/{id}', function ($id) {
    $anggota_list = [
        1 => [
            'id' => 1,
            'kode' => 'AGT-001',
            'nama' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'telepon' => '081234567890',
            'alamat' => 'Jakarta',
            'status' => 'Aktif'
        ],
        2 => [
            'id' => 2,
            'kode' => 'AGT-002',
            'nama' => 'Siti Aminah',
            'email' => 'siti@email.com',
            'telepon' => '081298765432',
            'alamat' => 'Bandung',
            'status' => 'Aktif'
        ],
        3 => [
            'id' => 3,
            'kode' => 'AGT-003',
            'nama' => 'Andi Nugroho',
            'email' => 'andi@email.com',
            'telepon' => '085612345678',
            'alamat' => 'Surabaya',
            'status' => 'Tidak Aktif'
        ],
        4 => [
            'id' => 4,
            'kode' => 'AGT-004',
            'nama' => 'Rina Wijaya',
            'email' => 'rina@email.com',
            'telepon' => '087812349876',
            'alamat' => 'Yogyakarta',
            'status' => 'Aktif'
        ],
        5 => [
            'id' => 5,
            'kode' => 'AGT-005',
            'nama' => 'Dedi Santoso',
            'email' => 'dedi@email.com',
            'telepon' => '089912341234',
            'alamat' => 'Semarang',
            'status' => 'Aktif'
        ],
    ];

    if (!isset($anggota_list[$id])) {
        abort(404, 'Anggota tidak ditemukan');
    }

    $anggota = $anggota_list[$id];

    return view('anggota.show', compact('anggota'));
})->name('anggota.show');

// ==========================================
// TUGAS 2: KATEGORI (Controller)
// ==========================================
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/search/{keyword}', [KategoriController::class, 'search'])->name('kategori.search');
Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');

// ==========================================
// PERPUSTAKAAN (Existing)
// ==========================================
Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('perpus.index');
Route::get('/buku/{id}', [PerpustakaanController::class, 'show'])->name('perpus.show');
Route::get('/about', [PerpustakaanController::class, 'about'])->name('perpus.about');