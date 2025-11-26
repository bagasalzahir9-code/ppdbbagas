<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;
use App\Models\Gelombang;
use App\Models\Pendaftar;
use App\Models\PendaftarDataSiswa;
use App\Models\Pengguna;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Hash;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample jurusan
        $jurusan = [
            ['nama_jurusan' => 'Teknik Komputer dan Jaringan', 'kuota' => 36, 'aktif' => true],
            ['nama_jurusan' => 'Rekayasa Perangkat Lunak', 'kuota' => 36, 'aktif' => true],
            ['nama_jurusan' => 'Multimedia', 'kuota' => 36, 'aktif' => true],
            ['nama_jurusan' => 'Akuntansi', 'kuota' => 36, 'aktif' => true],
            ['nama_jurusan' => 'Administrasi Perkantoran', 'kuota' => 36, 'aktif' => true]
        ];

        foreach ($jurusan as $j) {
            Jurusan::create($j);
        }

        // Create sample gelombang
        $gelombang = [
            [
                'nama_gelombang' => 'Gelombang 1',
                'tanggal_mulai' => '2024-01-01',
                'tanggal_selesai' => '2024-03-31',
                'biaya_daftar' => 150000,
                'aktif' => true
            ],
            [
                'nama_gelombang' => 'Gelombang 2', 
                'tanggal_mulai' => '2024-04-01',
                'tanggal_selesai' => '2024-06-30',
                'biaya_daftar' => 200000,
                'aktif' => true
            ]
        ];

        foreach ($gelombang as $g) {
            Gelombang::create($g);
        }

        // Create sample pendaftar with coordinates
        $samplePendaftar = [
            [
                'nama' => 'Ahmad Rizki',
                'email' => 'ahmad@gmail.com',
                'lat' => -6.2088,
                'lng' => 106.8456,
                'wilayah_id' => 1,
                'jurusan_id' => 1,
                'status' => 'LULUS'
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'email' => 'siti@gmail.com', 
                'lat' => -6.1751,
                'lng' => 106.8650,
                'wilayah_id' => 2,
                'jurusan_id' => 2,
                'status' => 'PAID'
            ],
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
                'lat' => -6.2297,
                'lng' => 106.6890,
                'wilayah_id' => 3,
                'jurusan_id' => 3,
                'status' => 'ADM_PASS'
            ],
            [
                'nama' => 'Dewi Sartika',
                'email' => 'dewi@gmail.com',
                'lat' => -6.1200,
                'lng' => 106.7539,
                'wilayah_id' => 4,
                'jurusan_id' => 4,
                'status' => 'SUBMIT'
            ],
            [
                'nama' => 'Eko Prasetyo',
                'email' => 'eko@gmail.com',
                'lat' => -6.1389,
                'lng' => 106.8186,
                'wilayah_id' => 5,
                'jurusan_id' => 5,
                'status' => 'LULUS'
            ]
        ];

        foreach ($samplePendaftar as $index => $data) {
            // Create user
            $user = Pengguna::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'hp' => '0812345678' . $index,
                'password_hash' => Hash::make('password'),
                'role' => 'pendaftar',
                'aktif' => 1
            ]);

            // Create pendaftar
            $pendaftar = Pendaftar::create([
                'user_id' => $user->id,
                'tanggal_daftar' => now(),
                'no_pendaftaran' => 'PPDB2024' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'gelombang_id' => 1,
                'jurusan_id' => $data['jurusan_id'],
                'status' => $data['status']
            ]);

            // Create pendaftar data siswa
            PendaftarDataSiswa::create([
                'pendaftar_id' => $pendaftar->id,
                'nik' => '3171' . str_pad($index + 1, 12, '0', STR_PAD_LEFT),
                'nisn' => '0012345' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'nama' => $data['nama'],
                'jk' => $index % 2 == 0 ? 'L' : 'P',
                'tmp_lahir' => 'Jakarta',
                'tgl_lahir' => '2006-01-01',
                'alamat' => 'Jl. Contoh No. ' . ($index + 1),
                'wilayah_id' => $data['wilayah_id'],
                'lat' => $data['lat'],
                'lng' => $data['lng']
            ]);
        }
    }
}