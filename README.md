
# PPDB Bagas

Sistem Penerimaan Peserta Didik Baru (PPDB) berbasis web yang dibangun menggunakan Laravel.

## Tentang Aplikasi

PPDB Bagas adalah aplikasi web untuk mengelola proses penerimaan peserta didik baru di sekolah. Aplikasi ini menyediakan fitur-fitur untuk:

- Pendaftaran calon siswa online
- Manajemen data pendaftar
- Verifikasi berkas pendaftaran
- Pengumuman hasil seleksi
- Dashboard admin untuk monitoring

## Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & NPM (untuk asset compilation)

## Instalasi

1. Clone repository
```bash
git clone <repository-url>
cd ppdbbagas
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Konfigurasi database di file `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ppdb_bagas
DB_USERNAME=root
DB_PASSWORD=
```

5. Jalankan migrasi dan seeder
```bash
php artisan migrate --seed
```

6. Compile assets
```bash
npm run dev
```

7. Jalankan server
```bash
php artisan serve
```

## Fitur Utama

- **Dashboard Admin**: Monitoring data pendaftar dan statistik
- **Pendaftaran Online**: Form pendaftaran untuk calon siswa
- **Upload Berkas**: Sistem upload dokumen persyaratan
- **Verifikasi**: Proses verifikasi berkas oleh admin
- **Pengumuman**: Sistem pengumuman hasil seleksi
- **Laporan**: Generate laporan data pendaftar

## Kontribusi

Untuk berkontribusi pada proyek ini:
1. Fork repository
2. Buat branch fitur baru
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

## Lisensi

Proyek ini menggunakan lisensi [MIT License](https://opensource.org/licenses/MIT).