<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Data kategori (nanti akan dari database)
     */
    private function getKategoriList()
    {
        return [
            [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25,
                'icon' => 'bi-code-slash'
            ],
            [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku tentang manajemen database dan SQL',
                'jumlah_buku' => 18,
                'icon' => 'bi-server'
            ],
            [
                'id' => 3,
                'nama' => 'Jaringan',
                'deskripsi' => 'Buku jaringan komputer dan networking',
                'jumlah_buku' => 12,
                'icon' => 'bi-diagram-3'
            ],
            [
                'id' => 4,
                'nama' => 'Desain',
                'deskripsi' => 'Buku desain grafis dan UI/UX',
                'jumlah_buku' => 15,
                'icon' => 'bi-palette'
            ],
            [
                'id' => 5,
                'nama' => 'Data Science',
                'deskripsi' => 'Buku data science, machine learning, dan AI',
                'jumlah_buku' => 20,
                'icon' => 'bi-graph-up'
            ],
        ];
    }

    /**
     * Data buku per kategori (nanti akan dari database)
     */
    private function getBukuByKategori($kategoriId)
    {
        $buku_data = [
            1 => [
                ['id' => 1, 'judul' => 'Pemrograman PHP', 'pengarang' => 'Budi Raharjo', 'tahun' => 2023, 'stok' => 10],
                ['id' => 2, 'judul' => 'Laravel Framework', 'pengarang' => 'Andi Nugroho', 'tahun' => 2024, 'stok' => 5],
                ['id' => 3, 'judul' => 'JavaScript Modern', 'pengarang' => 'Rina Wijaya', 'tahun' => 2023, 'stok' => 12],
                ['id' => 4, 'judul' => 'Python untuk Pemula', 'pengarang' => 'Sari Dewi', 'tahun' => 2024, 'stok' => 8],
                ['id' => 5, 'judul' => 'Java Programming', 'pengarang' => 'Dedi Santoso', 'tahun' => 2022, 'stok' => 6],
            ],
            2 => [
                ['id' => 6, 'judul' => 'MySQL Database', 'pengarang' => 'Siti Aminah', 'tahun' => 2023, 'stok' => 7],
                ['id' => 7, 'judul' => 'PostgreSQL Advanced', 'pengarang' => 'Ahmad Fauzi', 'tahun' => 2024, 'stok' => 4],
                ['id' => 8, 'judul' => 'MongoDB NoSQL', 'pengarang' => 'Lina Marlina', 'tahun' => 2023, 'stok' => 9],
            ],
            3 => [
                ['id' => 9, 'judul' => 'Jaringan Komputer', 'pengarang' => 'Hendra Kusuma', 'tahun' => 2022, 'stok' => 5],
                ['id' => 10, 'judul' => 'Cisco Networking', 'pengarang' => 'Rudi Hartono', 'tahun' => 2023, 'stok' => 3],
            ],
            4 => [
                ['id' => 11, 'judul' => 'UI/UX Design', 'pengarang' => 'Maya Sari', 'tahun' => 2024, 'stok' => 11],
                ['id' => 12, 'judul' => 'Adobe Photoshop', 'pengarang' => 'Dina Putri', 'tahun' => 2023, 'stok' => 6],
                ['id' => 13, 'judul' => 'Figma untuk Desainer', 'pengarang' => 'Eko Prasetyo', 'tahun' => 2024, 'stok' => 8],
            ],
            5 => [
                ['id' => 14, 'judul' => 'Machine Learning', 'pengarang' => 'Fajar Nugroho', 'tahun' => 2024, 'stok' => 7],
                ['id' => 15, 'judul' => 'Data Analysis Python', 'pengarang' => 'Lia Anggraini', 'tahun' => 2023, 'stok' => 9],
                ['id' => 16, 'judul' => 'Deep Learning', 'pengarang' => 'Irfan Maulana', 'tahun' => 2024, 'stok' => 4],
            ],
        ];

        return $buku_data[$kategoriId] ?? [];
    }

    /**
     * Method index() - Daftar Kategori
     */
    public function index()
    {
        $kategori_list = $this->getKategoriList();

        return view('kategori.index', compact('kategori_list'));
    }

    /**
     * Method show($id) - Detail Kategori
     */
    public function show($id)
    {
        $kategori_list = $this->getKategoriList();

        // Cari kategori berdasarkan ID
        $kategori = null;
        foreach ($kategori_list as $item) {
            if ($item['id'] == $id) {
                $kategori = $item;
                break;
            }
        }

        // Jika tidak ditemukan
        if (!$kategori) {
            abort(404, 'Kategori tidak ditemukan');
        }

        $buku_list = $this->getBukuByKategori($id);

        return view('kategori.show', compact('kategori', 'buku_list'));
    }

    /**
     * Method search($keyword) - Cari Kategori
     */
    public function search($keyword)
    {
        $kategori_list = $this->getKategoriList();

        // Filter kategori berdasarkan keyword (case-insensitive)
        $hasil = array_filter($kategori_list, function ($item) use ($keyword) {
            return stripos($item['nama'], $keyword) !== false
                || stripos($item['deskripsi'], $keyword) !== false;
        });

        $hasil = array_values($hasil); // Re-index

        return view('kategori.search', compact('hasil', 'keyword'));
    }
}
