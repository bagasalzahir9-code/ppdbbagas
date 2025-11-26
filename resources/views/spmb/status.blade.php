@extends('spmb.layout')
@section('title', 'Status Pendaftaran')

@section('content')
<!-- Hasil Seleksi Banner -->
@if(in_array($calonSiswa->status, ['lulus', 'tidak_lulus', 'cadangan']))
<div class="row mb-4">
    <div class="col-12">
        @if($calonSiswa->status == 'lulus')
        <div class="alert alert-success border-0" style="background: linear-gradient(135deg, #28a745, #20c997); animation: pulse 2s infinite;">
            <div class="text-center">
                <i class="fas fa-trophy" style="font-size: 3rem; color: #ffd700; margin-bottom: 15px;"></i>
                <h2 class="text-white fw-bold mb-3">🎉 SELAMAT! ANDA DITERIMA! 🎉</h2>
                <h4 class="text-white mb-3">{{ $calonSiswa->jurusan_pilihan ?? 'SMK BAKTI NUSANTARA 666' }}</h4>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <a href="{{ route('spmb.cetak') }}" class="btn btn-light btn-lg me-2">
                            <i class="fas fa-print"></i> Cetak Surat Penerimaan
                        </a>
                        <a href="{{ route('spmb.notifikasi') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-info-circle"></i> Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @elseif($calonSiswa->status == 'tidak_lulus')
        <div class="alert alert-danger border-0">
            <div class="text-center">
                <i class="fas fa-times-circle" style="font-size: 3rem; margin-bottom: 15px;"></i>
                <h3 class="text-white fw-bold mb-3">Hasil Seleksi</h3>
                <p class="text-white mb-3">Mohon maaf, Anda belum berhasil dalam seleksi PPDB kali ini.</p>
                <p class="text-white">Tetap semangat untuk kesempatan berikutnya!</p>
            </div>
        </div>
        @elseif($calonSiswa->status == 'cadangan')
        <div class="alert alert-warning border-0" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">
            <div class="text-center">
                <i class="fas fa-list-ol" style="font-size: 3rem; margin-bottom: 15px;"></i>
                <h3 class="text-white fw-bold mb-3">Daftar Cadangan</h3>
                <p class="text-white mb-3">Anda masuk dalam <strong>DAFTAR CADANGAN</strong></p>
                <p class="text-white">Pantau terus untuk informasi lebih lanjut!</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Timeline Pendaftaran</h4>
            </div>
            <div class="card-body">
                @php
                    $statusOrder = ['draft', 'dikirim', 'verifikasi_admin', 'menunggu_pembayaran', 'terbayar'];
                    $currentIndex = array_search($calonSiswa->status, $statusOrder);
                    
                    // Handle final results
                    if (in_array($calonSiswa->status, ['lulus', 'tidak_lulus', 'cadangan'])) {
                        $currentIndex = 5; // All steps completed
                    }
                @endphp
                
                <div class="modern-timeline">
                    <!-- Step 1: Formulir -->
                    <div class="step-card {{ $currentIndex >= 0 ? 'completed' : '' }} {{ $calonSiswa->status == 'draft' ? 'active' : '' }}">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <div class="step-header">
                                <i class="fas fa-edit step-icon"></i>
                                <h5>Formulir Pendaftaran</h5>
                                @if($currentIndex >= 0)
                                    <span class="badge bg-success"><i class="fas fa-check"></i></span>
                                @endif
                            </div>
                            <p class="step-desc">Lengkapi data diri dan pilih jurusan</p>
                            @if($calonSiswa->status == 'draft')
                                <a href="{{ route('spmb.formulir') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-arrow-right"></i> Lengkapi Sekarang
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Step 2: Upload Berkas -->
                    <div class="step-card {{ $currentIndex >= 1 ? 'completed' : '' }} {{ $calonSiswa->status == 'dikirim' ? 'active' : '' }}">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <div class="step-header">
                                <i class="fas fa-upload step-icon"></i>
                                <h5>Upload Berkas</h5>
                                @if($currentIndex >= 1)
                                    <span class="badge bg-success"><i class="fas fa-check"></i></span>
                                @endif
                            </div>
                            <p class="step-desc">Upload ijazah, rapor, KK, dan berkas lainnya</p>
                            @if($calonSiswa->status == 'dikirim')
                                <a href="{{ route('spmb.upload') }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-cloud-upload-alt"></i> Upload Berkas
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Step 3: Verifikasi Admin -->
                    <div class="step-card {{ $currentIndex >= 2 ? 'completed' : '' }} {{ $calonSiswa->status == 'verifikasi_admin' ? 'active' : '' }}">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <div class="step-header">
                                <i class="fas fa-user-check step-icon"></i>
                                <h5>Verifikasi Administrasi</h5>
                                @if($currentIndex >= 2)
                                    <span class="badge bg-success"><i class="fas fa-check"></i></span>
                                @elseif($calonSiswa->status == 'verifikasi_admin')
                                    <span class="badge bg-warning"><i class="fas fa-clock"></i></span>
                                @endif
                            </div>
                            <p class="step-desc">Tim administrasi memverifikasi kelengkapan berkas</p>
                        </div>
                    </div>

                    <!-- Step 4: Pembayaran -->
                    <div class="step-card {{ $currentIndex >= 3 ? 'completed' : '' }} {{ $calonSiswa->status == 'menunggu_pembayaran' ? 'active' : '' }}">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <div class="step-header">
                                <i class="fas fa-credit-card step-icon"></i>
                                <h5>Pembayaran</h5>
                                @if($currentIndex >= 4)
                                    <span class="badge bg-success"><i class="fas fa-check"></i></span>
                                @elseif($calonSiswa->status == 'menunggu_pembayaran')
                                    <span class="badge bg-warning"><i class="fas fa-exclamation-triangle"></i></span>
                                @endif
                            </div>
                            <p class="step-desc">Lakukan pembayaran biaya pendaftaran</p>
                            @if($calonSiswa->status == 'menunggu_pembayaran')
                                <a href="{{ route('spmb.pembayaran') }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-money-bill-wave"></i> Bayar Sekarang
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Step 5: Verifikasi Pembayaran -->
                    <div class="step-card {{ $currentIndex >= 4 ? 'completed' : '' }} {{ $calonSiswa->status == 'terbayar' ? 'active' : '' }}">
                        <div class="step-number">5</div>
                        <div class="step-content">
                            <div class="step-header">
                                <i class="fas fa-receipt step-icon"></i>
                                <h5>Verifikasi Pembayaran</h5>
                                @if($currentIndex >= 4)
                                    <span class="badge bg-success"><i class="fas fa-check"></i></span>
                                @endif
                            </div>
                            <p class="step-desc">Tim keuangan memverifikasi bukti pembayaran</p>
                        </div>
                    </div>

                    <!-- Step 6: Hasil Seleksi -->
                    <div class="step-card {{ $currentIndex >= 5 ? 'completed' : '' }} {{ in_array($calonSiswa->status, ['lulus', 'tidak_lulus', 'cadangan']) ? 'active' : '' }}">
                        <div class="step-number">6</div>
                        <div class="step-content">
                            <div class="step-header">
                                <i class="fas fa-trophy step-icon"></i>
                                <h5>Hasil Seleksi</h5>
                                @if($calonSiswa->status == 'lulus')
                                    <span class="badge bg-success"><i class="fas fa-trophy"></i> LULUS</span>
                                @elseif($calonSiswa->status == 'tidak_lulus')
                                    <span class="badge bg-danger"><i class="fas fa-times"></i> TIDAK LULUS</span>
                                @elseif($calonSiswa->status == 'cadangan')
                                    <span class="badge bg-warning"><i class="fas fa-list"></i> CADANGAN</span>
                                @else
                                    <span class="badge bg-secondary"><i class="fas fa-clock"></i> MENUNGGU</span>
                                @endif
                            </div>
                            @if($calonSiswa->status == 'lulus')
                                <p class="step-desc text-success fw-bold">🎉 Selamat! Anda diterima di {{ $calonSiswa->jurusan_pilihan ?? 'SMK BAKTI NUSANTARA 666' }}</p>
                                <a href="{{ route('spmb.cetak') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-print"></i> Cetak Surat Penerimaan
                                </a>
                            @elseif($calonSiswa->status == 'tidak_lulus')
                                <p class="step-desc text-danger">Mohon maaf, Anda belum berhasil pada seleksi ini. Tetap semangat!</p>
                            @elseif($calonSiswa->status == 'cadangan')
                                <p class="step-desc text-warning fw-bold">Anda masuk dalam daftar cadangan. Pantau terus untuk update!</p>
                            @else
                                <p class="step-desc">Menunggu pengumuman hasil seleksi</p>
                            @endif
                        </div>
                    </div>
                </div>
                
                <a href="{{ route('spmb.dashboard') }}" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</div>

<style>
.modern-timeline {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.step-card {
    background: #fff;
    border: 2px solid #e9ecef;
    border-radius: 15px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 20px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.step-card::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 5px;
    background: #dee2e6;
    transition: all 0.3s ease;
}

.step-card.completed::before {
    background: linear-gradient(135deg, #28a745, #20c997);
}

.step-card.active::before {
    background: linear-gradient(135deg, #007bff, #0056b3);
    animation: pulse-border 2s infinite;
}

.step-card.completed {
    border-color: #28a745;
    background: linear-gradient(135deg, rgba(40, 167, 69, 0.05), rgba(32, 201, 151, 0.05));
}

.step-card.active {
    border-color: #007bff;
    background: linear-gradient(135deg, rgba(0, 123, 255, 0.05), rgba(0, 86, 179, 0.05));
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.2);
}

.step-number {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #dee2e6;
    color: #6c757d;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.2rem;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.step-card.completed .step-number {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
}

.step-card.active .step-number {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    animation: pulse-number 2s infinite;
}

.step-content {
    flex: 1;
}

.step-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
}

.step-icon {
    font-size: 1.2rem;
    color: #6c757d;
    transition: color 0.3s ease;
}

.step-card.completed .step-icon {
    color: #28a745;
}

.step-card.active .step-icon {
    color: #007bff;
}

.step-header h5 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #495057;
}

.step-desc {
    margin: 0;
    color: #6c757d;
    font-size: 0.9rem;
    line-height: 1.4;
}

@keyframes pulse-border {
    0% { box-shadow: 0 5px 15px rgba(0, 123, 255, 0.2); }
    50% { box-shadow: 0 8px 25px rgba(0, 123, 255, 0.4); }
    100% { box-shadow: 0 5px 15px rgba(0, 123, 255, 0.2); }
}

@keyframes pulse-number {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

@media (max-width: 768px) {
    .step-card {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .step-header {
        justify-content: center;
    }
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
</style>
@endsection