-- =============================================
-- PPDB BAGAS - Sample Data SQL
-- =============================================

-- Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS bagasppdb;
USE bagasppdb;

-- =============================================
-- 1. DATA ADMIN
-- =============================================
INSERT INTO admin (name, email, password, role, created_at, updated_at) VALUES
('Super Admin', 'admin@test.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'admin', NOW(), NOW()),
('Verifikator 1', 'verifikator@test.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'verifikator', NOW(), NOW()),
('Staff Keuangan', 'keuangan@test.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'keuangan', NOW(), NOW()),
('Kepala Sekolah', 'kepsek@test.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'kepala_sekolah', NOW(), NOW()),
('Panitia PPDB', 'panitia@test.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'panitia', NOW(), NOW());

-- =============================================
-- 2. DATA JURUSAN
-- =============================================
INSERT INTO jurusan (nama_jurusan, kuota, aktif, created_at, updated_at) VALUES
('Teknik Komputer dan Jaringan (TKJ)', 36, 1, NOW(), NOW()),
('Multimedia (MM)', 36, 1, NOW(), NOW()),
('Akuntansi dan Keuangan Lembaga (AKL)', 36, 1, NOW(), NOW()),
('Otomatisasi dan Tata Kelola Perkantoran (OTKP)', 36, 1, NOW(), NOW()),
('Bisnis Daring dan Pemasaran (BDP)', 36, 1, NOW(), NOW()),
('Teknik Kendaraan Ringan Otomotif (TKRO)', 36, 1, NOW(), NOW());

-- =============================================
-- 3. DATA GELOMBANG
-- =============================================
INSERT INTO gelombang (nama_gelombang, tanggal_mulai, tanggal_selesai, biaya_daftar, aktif, created_at, updated_at) VALUES
('Gelombang 1', '2024-01-15', '2024-02-15', 150000.00, 1, NOW(), NOW()),
('Gelombang 2', '2024-02-16', '2024-03-15', 175000.00, 1, NOW(), NOW()),
('Gelombang 3', '2024-03-16', '2024-04-15', 200000.00, 0, NOW(), NOW());

-- =============================================
-- 4. DATA CALON SISWA
-- =============================================
INSERT INTO calon_siswa (email, password, nama_lengkap, nik, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, no_hp, asal_sekolah, jurusan_pilihan, status, kecamatan, kelurahan, kode_pos, latitude, longitude, created_at, updated_at) VALUES
('ahmad@gmail.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'Ahmad Fauzi', '3201012001010001', 'Jakarta', '2001-01-20', 'L', 'Jl. Merdeka No. 123, Jakarta Pusat', '081234567890', 'SMP Negeri 1 Jakarta', 'Teknik Komputer dan Jaringan (TKJ)', 'dikirim', 'Gambir', 'Gambir', '10110', -6.1751, 106.8650, NOW(), NOW()),
('siti@gmail.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'Siti Nurhaliza', '3201012002020002', 'Bogor', '2002-02-15', 'P', 'Jl. Raya Bogor No. 456, Bogor', '081234567891', 'SMP Negeri 2 Bogor', 'Multimedia (MM)', 'verifikasi_admin', 'Bogor Tengah', 'Paledang', '16121', -6.5971, 106.8060, NOW(), NOW()),
('budi@gmail.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'Budi Santoso', '3201012003030003', 'Depok', '2003-03-10', 'L', 'Jl. Margonda Raya No. 789, Depok', '081234567892', 'SMP Negeri 3 Depok', 'Akuntansi dan Keuangan Lembaga (AKL)', 'menunggu_pembayaran', 'Pancoran Mas', 'Depok', '16431', -6.4025, 106.7942, NOW(), NOW()),
('rina@gmail.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'Rina Wati', '3201012004040004', 'Tangerang', '2004-04-05', 'P', 'Jl. Sudirman No. 321, Tangerang', '081234567893', 'SMP Negeri 4 Tangerang', 'Otomatisasi dan Tata Kelola Perkantoran (OTKP)', 'terbayar', 'Tangerang', 'Sukasari', '15111', -6.1783, 106.6319, NOW(), NOW()),
('doni@gmail.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'Doni Pratama', '3201012005050005', 'Bekasi', '2005-05-25', 'L', 'Jl. Ahmad Yani No. 654, Bekasi', '081234567894', 'SMP Negeri 5 Bekasi', 'Bisnis Daring dan Pemasaran (BDP)', 'verifikasi_keuangan', 'Bekasi Timur', 'Margahayu', '17113', -6.2383, 107.0253, NOW(), NOW()),
('siswa@test.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'Test Siswa', '3201012006060006', 'Jakarta', '2006-06-15', 'L', 'Jl. Test No. 999, Jakarta', '081234567895', 'SMP Test', 'Teknik Kendaraan Ringan Otomotif (TKRO)', 'lulus', 'Cengkareng', 'Cengkareng Barat', '11730', -6.1395, 106.7407, NOW(), NOW()),
('siswa123@test.com', '$2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O', 'Siswa Baru', '3201012007070007', 'Jakarta', '2007-07-20', 'P', 'Jl. Baru No. 888, Jakarta', '081234567896', 'SMP Baru', 'Multimedia (MM)', 'draft', 'Kemayoran', 'Kemayoran', '10630', -6.1745, 106.8227, NOW(), NOW());

-- =============================================
-- 5. DATA PENDAFTAR (SPMB System)
-- =============================================
INSERT INTO pendaftar (user_id, tanggal_daftar, no_pendaftaran, gelombang_id, jurusan_id, status, user_verifikasi_adm, tgl_verifikasi_adm, created_at, updated_at) VALUES
(1, '2024-01-20 10:00:00', 'PPDB2024010001', 1, 1, 'SUBMIT', NULL, NULL, NOW(), NOW()),
(2, '2024-01-21 11:00:00', 'PPDB2024010002', 1, 2, 'ADM_PASS', 'verifikator@test.com', '2024-01-22 09:00:00', NOW(), NOW()),
(3, '2024-01-22 12:00:00', 'PPDB2024010003', 1, 3, 'ADM_PASS', 'verifikator@test.com', '2024-01-23 10:00:00', NOW(), NOW()),
(4, '2024-01-23 13:00:00', 'PPDB2024010004', 1, 4, 'PAID', 'verifikator@test.com', '2024-01-24 11:00:00', NOW(), NOW()),
(5, '2024-01-24 14:00:00', 'PPDB2024010005', 1, 5, 'PAID', 'verifikator@test.com', '2024-01-25 12:00:00', NOW(), NOW());

-- =============================================
-- 6. DATA SISWA DETAIL
-- =============================================
INSERT INTO pendaftar_data_siswa (pendaftar_id, nik, nisn, nama, jk, tmp_lahir, tgl_lahir, alamat, wilayah_id, lat, lng) VALUES
(1, '3201012001010001', '0012345678', 'Ahmad Fauzi', 'L', 'Jakarta', '2001-01-20', 'Jl. Merdeka No. 123, Jakarta Pusat', 3171, -6.1751000, 106.8650000),
(2, '3201012002020002', '0012345679', 'Siti Nurhaliza', 'P', 'Bogor', '2002-02-15', 'Jl. Raya Bogor No. 456, Bogor', 3201, -6.5971000, 106.8060000),
(3, '3201012003030003', '0012345680', 'Budi Santoso', 'L', 'Depok', '2003-03-10', 'Jl. Margonda Raya No. 789, Depok', 3276, -6.4025000, 106.7942000),
(4, '3201012004040004', '0012345681', 'Rina Wati', 'P', 'Tangerang', '2004-04-05', 'Jl. Sudirman No. 321, Tangerang', 3671, -6.1783000, 106.6319000),
(5, '3201012005050005', '0012345682', 'Doni Pratama', 'L', 'Bekasi', '2005-05-25', 'Jl. Ahmad Yani No. 654, Bekasi', 3275, -6.2383000, 107.0253000);

-- =============================================
-- 7. DATA ORANG TUA
-- =============================================
INSERT INTO pendaftar_data_ortu (pendaftar_id, nama_ayah, pekerjaan_ayah, hp_ayah, nama_ibu, pekerjaan_ibu, hp_ibu, wali_nama, wali_hp) VALUES
(1, 'Bapak Ahmad', 'Pegawai Swasta', '081111111111', 'Ibu Siti', 'Ibu Rumah Tangga', '081111111112', NULL, NULL),
(2, 'Bapak Slamet', 'Wiraswasta', '081222222221', 'Ibu Ningsih', 'Guru', '081222222222', NULL, NULL),
(3, 'Bapak Budi Sr', 'PNS', '081333333331', 'Ibu Ratna', 'Perawat', '081333333332', NULL, NULL),
(4, 'Bapak Joko', 'Pedagang', '081444444441', 'Ibu Rina Sr', 'Ibu Rumah Tangga', '081444444442', NULL, NULL),
(5, 'Bapak Dono', 'Supir', '081555555551', 'Ibu Sari', 'Penjahit', '081555555552', NULL, NULL);

-- =============================================
-- 8. DATA ASAL SEKOLAH
-- =============================================
INSERT INTO pendaftar_asal_sekolah (pendaftar_id, npsn, nama_sekolah, kabupaten, nilai_rata) VALUES
(1, '20100001', 'SMP Negeri 1 Jakarta', 'Jakarta Pusat', 85.50),
(2, '20200002', 'SMP Negeri 2 Bogor', 'Bogor', 87.25),
(3, '20300003', 'SMP Negeri 3 Depok', 'Depok', 82.75),
(4, '20400004', 'SMP Negeri 4 Tangerang', 'Tangerang', 88.00),
(5, '20500005', 'SMP Negeri 5 Bekasi', 'Bekasi', 84.50);

-- =============================================
-- 9. DATA BERKAS
-- =============================================
INSERT INTO pendaftar_berkas (pendaftar_id, jenis, nama_file, url, ukuran_kb, valid, catatan) VALUES
(1, 'IJAZAH', 'ijazah_ahmad.pdf', '/storage/berkas/ijazah_ahmad.pdf', 250, 1, 'Berkas lengkap'),
(1, 'RAPOR', 'rapor_ahmad.pdf', '/storage/berkas/rapor_ahmad.pdf', 180, 1, 'Nilai bagus'),
(1, 'AKTA', 'akta_ahmad.pdf', '/storage/berkas/akta_ahmad.pdf', 120, 1, 'Sesuai'),
(2, 'IJAZAH', 'ijazah_siti.pdf', '/storage/berkas/ijazah_siti.pdf', 230, 1, 'Berkas lengkap'),
(2, 'RAPOR', 'rapor_siti.pdf', '/storage/berkas/rapor_siti.pdf', 190, 1, 'Nilai sangat baik'),
(3, 'IJAZAH', 'ijazah_budi.pdf', '/storage/berkas/ijazah_budi.pdf', 240, 0, 'Perlu diperbaiki'),
(4, 'IJAZAH', 'ijazah_rina.pdf', '/storage/berkas/ijazah_rina.pdf', 260, 1, 'Berkas lengkap'),
(4, 'KIP', 'kip_rina.pdf', '/storage/berkas/kip_rina.pdf', 100, 1, 'Valid'),
(5, 'IJAZAH', 'ijazah_doni.pdf', '/storage/berkas/ijazah_doni.pdf', 220, 1, 'Berkas lengkap');

-- =============================================
-- 10. DATA PEMBAYARAN
-- =============================================
INSERT INTO pembayaran (pendaftar_id, jenis_pembayaran, jumlah, tanggal_bayar, status, bukti_bayar, keterangan, created_at, updated_at) VALUES
(4, 'pendaftaran', 150000.00, '2024-01-25', 'lunas', '/storage/bukti/bayar_rina.jpg', 'Pembayaran via transfer BCA', NOW(), NOW()),
(5, 'pendaftaran', 150000.00, '2024-01-26', 'lunas', '/storage/bukti/bayar_doni.jpg', 'Pembayaran via transfer Mandiri', NOW(), NOW()),
(3, 'pendaftaran', 150000.00, '2024-01-27', 'pending', '/storage/bukti/bayar_budi.jpg', 'Menunggu verifikasi', NOW(), NOW());

-- =============================================
-- 11. DATA NOTIFIKASI
-- =============================================
INSERT INTO notifikasi (calon_siswa_id, jenis, judul, pesan, terkirim, tanggal_kirim, created_at, updated_at) VALUES
(1, 'email', 'Pendaftaran Berhasil', 'Selamat! Pendaftaran Anda telah berhasil disubmit. Silakan lengkapi berkas yang diperlukan.', 1, '2024-01-20 10:30:00', NOW(), NOW()),
(2, 'email', 'Verifikasi Administrasi', 'Berkas administrasi Anda telah diverifikasi dan dinyatakan LULUS. Silakan lakukan pembayaran.', 1, '2024-01-22 09:30:00', NOW(), NOW()),
(3, 'email', 'Menunggu Pembayaran', 'Berkas administrasi Anda telah diverifikasi. Silakan lakukan pembayaran sebelum batas waktu.', 1, '2024-01-23 10:30:00', NOW(), NOW()),
(4, 'email', 'Pembayaran Diterima', 'Pembayaran Anda telah diterima dan diverifikasi. Selamat Anda dinyatakan LULUS seleksi PPDB.', 1, '2024-01-25 14:00:00', NOW(), NOW()),
(5, 'sms', 'Verifikasi Pembayaran', 'Pembayaran Anda sedang dalam proses verifikasi oleh tim keuangan.', 0, NULL, NOW(), NOW());

-- =============================================
-- 12. LOG AKTIVITAS
-- =============================================
INSERT INTO log_aktivitas (user_id, aksi, objek, objek_data, waktu, ip) VALUES
(1, 'LOGIN', 'ADMIN', '{"email":"admin@test.com","role":"admin"}', '2024-01-20 08:00:00', '127.0.0.1'),
(2, 'VERIFIKASI', 'PENDAFTAR', '{"pendaftar_id":2,"status":"ADM_PASS"}', '2024-01-22 09:00:00', '127.0.0.1'),
(3, 'VERIFIKASI_BAYAR', 'PEMBAYARAN', '{"pembayaran_id":1,"status":"lunas"}', '2024-01-25 14:30:00', '127.0.0.1'),
(1, 'EXPORT', 'LAPORAN', '{"jenis":"rekap_pendaftar","periode":"2024-01"}', '2024-01-26 10:00:00', '127.0.0.1'),
(4, 'LOGIN', 'KEPALA_SEKOLAH', '{"email":"kepsek@test.com","role":"kepala_sekolah"}', '2024-01-26 11:00:00', '127.0.0.1');

-- =============================================
-- SELESAI
-- =============================================
-- Password untuk semua akun: password
-- Hash: $2y$12$zMRQjcdQ.6kgzwOmUH559uHmxh2l3bX8wtb8R2uLrq0Q2OZiqAe1O

SELECT 'Data sample berhasil diinsert!' as status;