@extends('spmb.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-bell"></i> Notifikasi & Status</span>
                    <small class="text-muted">{{ now()->format('d M Y, H:i') }}</small>
                </div>
                <div class="card-body">
                    <!-- Notifikasi Khusus untuk Siswa Diterima -->
                    @if($calonSiswa->status == 'lulus')
                    <div class="alert alert-success border-0 mb-4" style="background: linear-gradient(135deg, #28a745, #20c997); animation: pulse 2s infinite;">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-trophy trophy-bounce" style="font-size: 2.5rem; color: #ffd700;"></i>
                            </div>
                            <div class="col">
                                <h4 class="mb-1 text-white fw-bold">🎉 PENGUMUMAN PENTING! 🎉</h4>
                                <p class="mb-0 text-white">Anda telah <strong>DITERIMA</strong> di SMK BAKTI NUSANTARA 666 jurusan {{ $calonSiswa->jurusan_pilihan }}!</p>
                            </div>
                            <div class="col-auto">
                                <a href="#hasil-seleksi" class="btn btn-light btn-sm">
                                    <i class="fas fa-arrow-down"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Status Utama -->
                    @if($calonSiswa->status == 'draft')
                    <div class="alert alert-secondary">
                        <h5><i class="fas fa-edit"></i> Draft Pendaftaran</h5>
                        <p>Formulir Anda masih dalam status draft. Silakan lengkapi dan kirim formulir pendaftaran.</p>
                        <a href="{{ route('spmb.formulir') }}" class="btn btn-primary btn-sm">Lengkapi Formulir</a>
                    </div>
                    @elseif($calonSiswa->status == 'dikirim')
                    <div class="alert alert-info">
                        <h5><i class="fas fa-paper-plane"></i> Formulir Terkirim</h5>
                        <p>Formulir pendaftaran telah dikirim. Silakan upload berkas persyaratan.</p>
                        <a href="{{ route('spmb.upload') }}" class="btn btn-info btn-sm">Upload Berkas</a>
                    </div>
                    @elseif($calonSiswa->status == 'verifikasi_admin')
                    <div class="alert alert-warning">
                        <h5><i class="fas fa-clock"></i> Verifikasi Administrasi</h5>
                        <p>Berkas Anda sedang dalam proses verifikasi oleh tim administrasi. Mohon tunggu konfirmasi.</p>
                    </div>
                    @elseif($calonSiswa->status == 'menunggu_pembayaran')
                    <div class="alert alert-warning">
                        <h5><i class="fas fa-credit-card"></i> Menunggu Pembayaran</h5>
                        <p>Verifikasi administrasi selesai. Silakan lakukan pembayaran biaya pendaftaran.</p>
                        <a href="{{ route('spmb.pembayaran') }}" class="btn btn-warning btn-sm">Bayar Sekarang</a>
                    </div>
                    @elseif($calonSiswa->status == 'terbayar')
                    <div class="alert alert-success">
                        <h5><i class="fas fa-check-circle"></i> Pembayaran Berhasil</h5>
                        <p>Pembayaran telah dikonfirmasi. Anda dapat mencetak kartu peserta ujian.</p>
                        <a href="{{ route('spmb.kartu.cetak') }}" class="btn btn-success btn-sm">Cetak Kartu</a>
                    </div>
                    @elseif($calonSiswa->status == 'lulus')
                    <div id="hasil-seleksi" class="alert alert-success border-0" style="background: linear-gradient(135deg, #28a745, #20c997); color: white;">
                        <div class="text-center mb-3">
                            <i class="fas fa-trophy trophy-bounce" style="font-size: 3rem; color: #ffd700;"></i>
                        </div>
                        <h3 class="text-center fw-bold mb-3">🎉 SELAMAT! ANDA DITERIMA! 🎉</h3>
                        <div class="text-center mb-4">
                            <h5 class="mb-2">Anda telah diterima di:</h5>
                            <div class="badge bg-light text-dark fs-6 px-4 py-2 mb-3">
                                <strong>{{ $calonSiswa->jurusan_pilihan ?? 'SMK BAKTI NUSANTARA 666' }}</strong>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-4 mb-2">
                                <div class="bg-white bg-opacity-25 rounded p-3">
                                    <i class="fas fa-calendar-check fa-2x mb-2"></i>
                                    <div><strong>Tahun Ajaran</strong></div>
                                    <div>2024/2025</div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="bg-white bg-opacity-25 rounded p-3">
                                    <i class="fas fa-graduation-cap fa-2x mb-2"></i>
                                    <div><strong>Jenjang</strong></div>
                                    <div>SMK</div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="bg-white bg-opacity-25 rounded p-3">
                                    <i class="fas fa-id-card fa-2x mb-2"></i>
                                    <div><strong>No. Pendaftar</strong></div>
                                    <div>{{ str_pad($calonSiswa->id, 4, '0', STR_PAD_LEFT) }}</div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" style="border-color: rgba(255,255,255,0.3);">
                        <div class="text-center">
                            <h6 class="mb-3"><i class="fas fa-exclamation-triangle"></i> LANGKAH SELANJUTNYA:</h6>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="bg-white bg-opacity-25 rounded p-3">
                                        <i class="fas fa-file-signature fa-2x mb-2"></i>
                                        <div><strong>1. Daftar Ulang</strong></div>
                                        <small>Segera lakukan daftar ulang sebelum batas waktu</small>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="bg-white bg-opacity-25 rounded p-3">
                                        <i class="fas fa-print fa-2x mb-2"></i>
                                        <div><strong>2. Cetak Surat</strong></div>
                                        <small>Cetak surat penerimaan sebagai bukti</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('spmb.cetak') }}" class="btn btn-light btn-lg me-2">
                                <i class="fas fa-print"></i> Cetak Surat Penerimaan
                            </a>
                            <a href="{{ route('spmb.kartu.cetak') }}" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-id-card"></i> Cetak Kartu Siswa
                            </a>
                        </div>
                        <div class="text-center mt-3">
                            <small><i class="fas fa-info-circle"></i> Simpan halaman ini sebagai bukti penerimaan</small>
                        </div>
                    </div>
                    @elseif($calonSiswa->status == 'tidak_lulus')
                    <div class="alert alert-danger border-0">
                        <div class="text-center mb-3">
                            <i class="fas fa-times-circle" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="text-center fw-bold mb-3">Hasil Seleksi</h4>
                        <div class="text-center mb-4">
                            <p class="mb-2">Mohon maaf, Anda belum berhasil dalam seleksi PPDB kali ini.</p>
                            <div class="bg-white bg-opacity-25 rounded p-3 mt-3">
                                <h6><i class="fas fa-lightbulb"></i> Jangan Menyerah!</h6>
                                <p class="mb-0">Tetap semangat dan persiapkan diri untuk kesempatan selanjutnya. Setiap kegagalan adalah langkah menuju kesuksesan.</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <small><i class="fas fa-heart"></i> Terima kasih telah berpartisipasi dalam PPDB SMK BAKTI NUSANTARA 666</small>
                        </div>
                    </div>
                    @elseif($calonSiswa->status == 'cadangan')
                    <div class="alert alert-warning border-0" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">
                        <div class="text-center mb-3">
                            <i class="fas fa-list-ol" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="text-center fw-bold mb-3">Daftar Cadangan</h4>
                        <div class="text-center mb-4">
                            <p class="mb-2">Selamat! Anda masuk dalam <strong>DAFTAR CADANGAN</strong></p>
                            <div class="bg-white bg-opacity-25 rounded p-3 mt-3">
                                <h6><i class="fas fa-clock"></i> Tetap Pantau!</h6>
                                <p class="mb-2">Anda memiliki kesempatan untuk diterima jika ada siswa yang mengundurkan diri.</p>
                                <p class="mb-0"><strong>Pastikan selalu memantau notifikasi ini untuk update terbaru.</strong></p>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="bg-white bg-opacity-25 rounded p-2">
                                        <i class="fas fa-bell"></i> <strong>Pantau Notifikasi</strong>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="bg-white bg-opacity-25 rounded p-2">
                                        <i class="fas fa-phone"></i> <strong>Siaga Telepon</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Informasi Progress -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h6 class="mb-0"><i class="fas fa-tasks"></i> Progress Pendaftaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="progress-item">
                                        <span class="badge {{ $calonSiswa->nama_lengkap ? 'badge-success' : 'badge-secondary' }}">
                                            <i class="fas {{ $calonSiswa->nama_lengkap ? 'fa-check' : 'fa-times' }}"></i>
                                        </span>
                                        Formulir Pendaftaran
                                    </div>
                                    <div class="progress-item mt-2">
                                        <span class="badge {{ $calonSiswa->hasUploadedAllRequiredFiles() ? 'badge-success' : 'badge-secondary' }}">
                                            <i class="fas {{ $calonSiswa->hasUploadedAllRequiredFiles() ? 'fa-check' : 'fa-times' }}"></i>
                                        </span>
                                        Upload Berkas
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="progress-item">
                                        <span class="badge {{ $calonSiswa->bukti_pembayaran ? 'badge-success' : 'badge-secondary' }}">
                                            <i class="fas {{ $calonSiswa->bukti_pembayaran ? 'fa-check' : 'fa-times' }}"></i>
                                        </span>
                                        Pembayaran
                                    </div>
                                    <div class="progress-item mt-2">
                                        <span class="badge {{ in_array($calonSiswa->status, ['terbayar', 'lulus']) ? 'badge-success' : 'badge-secondary' }}">
                                            <i class="fas {{ in_array($calonSiswa->status, ['terbayar', 'lulus']) ? 'fa-check' : 'fa-times' }}"></i>
                                        </span>
                                        Verifikasi Selesai
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Penting -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h6 class="mb-0"><i class="fas fa-info-circle"></i> Informasi Penting</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li><i class="fas fa-calendar text-primary"></i> Batas waktu pendaftaran: <strong>31 Desember 2024</strong></li>
                                <li><i class="fas fa-money-bill text-success"></i> Biaya pendaftaran: <strong>Rp 150.000</strong></li>
                                <li><i class="fas fa-phone text-info"></i> Hotline: <strong>0274-123456</strong></li>
                                <li><i class="fas fa-envelope text-warning"></i> Email: <strong>ppdb@sekolah.sch.id</strong></li>
                            </ul>
                        </div>
                    </div>

                    @if($calonSiswa->tanggal_pembayaran)
                    <div class="card mt-3">
                        <div class="card-header">
                            <h6 class="mb-0"><i class="fas fa-history"></i> Riwayat Pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <p class="mb-1"><strong>Tanggal:</strong> {{ $calonSiswa->tanggal_pembayaran->format('d M Y, H:i') }}</p>
                            <p class="mb-1"><strong>Nominal:</strong> Rp {{ number_format($calonSiswa->nominal_pembayaran, 0, ',', '.') }}</p>
                            <p class="mb-0"><strong>Status:</strong> 
                                <span class="badge badge-{{ $calonSiswa->status == 'terbayar' ? 'success' : 'warning' }}">
                                    {{ $calonSiswa->getStatusLabelAttribute() }}
                                </span>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.progress-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(40, 167, 69, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
    }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

.trophy-bounce {
    animation: bounce 2s infinite;
}
</style>
@endsection