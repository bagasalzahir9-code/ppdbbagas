@extends('spmb.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Notifikasi</div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h5><i class="fas fa-info-circle"></i> Informasi Terbaru</h5>
                        <p>Selamat datang di sistem PPDB online. Pastikan Anda melengkapi semua data yang diperlukan.</p>
                    </div>
                    
                    @if($calonSiswa->status == 'pending')
                    <div class="alert alert-warning">
                        <h5><i class="fas fa-clock"></i> Status Pendaftaran</h5>
                        <p>Pendaftaran Anda sedang dalam proses verifikasi. Mohon tunggu konfirmasi dari panitia.</p>
                    </div>
                    @endif
                    
                    @if($calonSiswa->status == 'diterima')
                    <div class="alert alert-success">
                        <h5><i class="fas fa-check-circle"></i> Selamat!</h5>
                        <p>Pendaftaran Anda telah diterima. Silakan lakukan pembayaran dan cetak kartu peserta.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection