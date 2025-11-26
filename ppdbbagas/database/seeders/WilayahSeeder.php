<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wilayah;

class WilayahSeeder extends Seeder
{
    public function run(): void
    {
        $wilayah = [
            ['provinsi' => 'DKI Jakarta', 'kabupaten' => 'Jakarta Pusat', 'kecamatan' => 'Gambir', 'kelurahan' => 'Gambir', 'kodepos' => '10110'],
            ['provinsi' => 'DKI Jakarta', 'kabupaten' => 'Jakarta Pusat', 'kecamatan' => 'Tanah Abang', 'kelurahan' => 'Bendungan Hilir', 'kodepos' => '10210'],
            ['provinsi' => 'DKI Jakarta', 'kabupaten' => 'Jakarta Selatan', 'kecamatan' => 'Kebayoran Baru', 'kelurahan' => 'Senayan', 'kodepos' => '12190'],
            ['provinsi' => 'DKI Jakarta', 'kabupaten' => 'Jakarta Barat', 'kecamatan' => 'Kebon Jeruk', 'kelurahan' => 'Duri Kepa', 'kodepos' => '11510'],
            ['provinsi' => 'DKI Jakarta', 'kabupaten' => 'Jakarta Utara', 'kecamatan' => 'Tanjung Priok', 'kelurahan' => 'Sunter Jaya', 'kodepos' => '14350'],
            ['provinsi' => 'Jawa Barat', 'kabupaten' => 'Bogor', 'kecamatan' => 'Bogor Tengah', 'kelurahan' => 'Paledang', 'kodepos' => '16122'],
            ['provinsi' => 'Jawa Barat', 'kabupaten' => 'Depok', 'kecamatan' => 'Pancoran Mas', 'kelurahan' => 'Depok', 'kodepos' => '16431'],
            ['provinsi' => 'Banten', 'kabupaten' => 'Tangerang', 'kecamatan' => 'Tangerang', 'kelurahan' => 'Sukasari', 'kodepos' => '15118'],
        ];

        foreach ($wilayah as $data) {
            Wilayah::create($data);
        }
    }
}