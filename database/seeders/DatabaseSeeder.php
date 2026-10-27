<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Biodata1192;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $bio = Biodata1192::create([
            'nama_lengkap' => 'Syafiqah',
            'profesi'      => 'Web Developer & UI/UX Designer',
            'email'        => 'syafiqah25ti@mahasiswa.pcr.ac.id',
            'telepon'      => '081234567890',
            'alamat'       => 'Pekanbaru, Riau',
            'ringkasan'    => 'Mahasiswi Teknik Informatika yang berfokus pada pengembangan aplikasi web modern, perancangan antarmuka pengguna (UI/UX), dan implementasi framework Laravel. Memiliki ketertarikan tinggi dalam eksplorasi teknologi baru serta pemecahan masalah secara efektif.',
            'foto'         => 'biodata_fotos/syafiqah.jpg',
        ]);

        Pendidikan::create([
            'biodata_id'     => $bio->id,
            'nama_institusi' => 'Politeknik Caltex Riau',
            'jenjang'        => 'D4',
            'jurusan'        => 'Teknik Informatika',
            'tahun_masuk'    => '2024',
            'tahun_lulus'    => 'Sekarang',
            'deskripsi'      => 'Fokus pada Pemrograman Web, Framework Laravel, Basis Data MySQL, dan Rekayasa Perangkat Lunak.',
        ]);

        Pendidikan::create([
            'biodata_id'     => $bio->id,
            'nama_institusi' => 'SMA Negeri 1 Pekanbaru',
            'jenjang'        => 'SMA',
            'jurusan'        => 'MIPA',
            'tahun_masuk'    => '2021',
            'tahun_lulus'    => '2024',
            'deskripsi'      => 'Lulus dengan predikat memuaskan, aktif dalam organisasi ekstrakurikuler Komputer & IT Club.',
        ]);

        Pengalaman::create([
            'biodata_id'    => $bio->id,
            'posisi'        => 'Frontend Developer Intern',
            'perusahaan'    => 'Tech Solusindo Creative',
            'tahun_mulai'   => '2025',
            'tahun_selesai' => '2026',
            'deskripsi'     => 'Merancang dan mengimplementasikan antarmuka website responsif dengan Bootstrap dan Vue.js, berkolaborasi dengan tim backend.',
        ]);

        Pengalaman::create([
            'biodata_id'    => $bio->id,
            'posisi'        => 'Asisten Praktikum Lab Komputer',
            'perusahaan'    => 'Politeknik Caltex Riau',
            'tahun_mulai'   => '2025',
            'tahun_selesai' => 'Sekarang',
            'deskripsi'     => 'Membimbing mahasiswa baru dalam praktikum algoritma, pemrograman dasar, dan instalasi environment pengembangan web.',
        ]);
    }
}
