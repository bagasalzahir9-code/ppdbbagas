@extends('spmb.layout')
@section('title', 'Status Pendaftaran')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Status Pendaftaran</h4>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item {{ $calonSiswa->status == 'draft' ? 'active' : 'completed' }}">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h6>Draft</h6>
                            <p>Pendaftaran dimulai</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item {{ $calonSiswa->status == 'dikirim' ? 'active' : ($calonSiswa->status != 'draft' ? 'completed' : '') }}">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h6>Dikirim</h6>
                            <p>Berkas telah diupload dan dikirim</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item {{ $calonSiswa->status == 'verifikasi_admin' ? 'active' : (in_array($calonSiswa->status, ['menunggu_pembayaran', 'terbayar', 'verifikasi_keuangan', 'lulus', 'tidak_lulus', 'cadangan']) ? 'completed' : '') }}">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h6>Verifikasi Administrasi</h6>
                            <p>Berkas sedang diverifikasi oleh admin</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item {{ $calonSiswa->status == 'menunggu_pembayaran' ? 'active' : (in_array($calonSiswa->status, ['terbayar', 'verifikasi_keuangan', 'lulus', 'tidak_lulus', 'cadangan']) ? 'completed' : '') }}">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h6>Menunggu Pembayaran</h6>
                            <p>Silakan lakukan pembayaran</p>
                            @if($calonSiswa->status == 'menunggu_pembayaran')
                                <a href="{{ route('spmb.pembayaran') }}" class="btn btn-warning btn-sm">Bayar Sekarang</a>
                            @endif
                        </div>
                    </div>
                    
                    <div class="timeline-item {{ $calonSiswa->status == 'terbayar' ? 'active' : (in_array($calonSiswa->status, ['verifikasi_keuangan', 'lulus', 'tidak_lulus', 'cadangan']) ? 'completed' : '') }}">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h6>Terbayar</h6>
                            <p>Pembayaran telah diterima</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item {{ $calonSiswa->status == 'verifikasi_keuangan' ? 'active' : (in_array($calonSiswa->status, ['lulus', 'tidak_lulus', 'cadangan']) ? 'completed' : '') }}">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h6>Verifikasi Keuangan</h6>
                            <p>Pembayaran sedang diverifikasi</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item {{ in_array($calonSiswa->status, ['lulus', 'tidak_lulus', 'cadangan']) ? 'active' : '' }}">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h6>Hasil Seleksi</h6>
                            @if($calonSiswa->status == 'lulus')
                                <span class="badge bg-success">LULUS</span>
                            @elseif($calonSiswa->status == 'tidak_lulus')
                                <span class="badge bg-danger">TIDAK LULUS</span>
                            @elseif($calonSiswa->status == 'cadangan')
                                <span class="badge bg-warning">CADANGAN</span>
                            @else
                                <p>Menunggu hasil seleksi</p>
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
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    margin-bottom: 30px;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -22px;
    top: 0;
    bottom: -30px;
    width: 2px;
    background: #dee2e6;
}

.timeline-item:last-child::before {
    display: none;
}

.timeline-marker {
    position: absolute;
    left: -30px;
    top: 0;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #dee2e6;
    border: 3px solid #fff;
}

.timeline-item.completed .timeline-marker {
    background: #28a745;
}

.timeline-item.active .timeline-marker {
    background: #007bff;
}
</style>
@endsection