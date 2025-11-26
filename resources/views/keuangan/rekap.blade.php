@extends('admin.layout')
@section('title', 'Rekap Keuangan')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Rekap Keuangan</h2>
        <p>Laporan pemasukan biaya pendaftaran per gelombang/jurusan/periode</p>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Rekap Per Gelombang</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td><strong>Total Pendaftar Terbayar:</strong></td>
                        <td>{{ $rekap_per_gelombang->jumlah ?? 0 }}</td>
                    </tr>
                    <tr>
                        <td><strong>Total Pemasukan:</strong></td>
                        <td>Rp {{ number_format($rekap_per_gelombang->total ?? 0, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Export Excel/PDF</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.export.laporan') }}?format=excel&filter=pembayaran" class="btn btn-success">
                    <i class="fas fa-file-excel"></i> Export Excel
                </a>
                <a href="{{ route('admin.export.laporan') }}?format=pdf&filter=pembayaran" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Rekap Per Jurusan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Jumlah Terbayar</th>
                        <th>Total Pemasukan</th>
                        <th>Rata-rata</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekap_per_jurusan as $rekap)
                    <tr>
                        <td>{{ $rekap->jurusan_pilihan ?: 'Belum Pilih' }}</td>
                        <td><span class="badge bg-primary">{{ $rekap->jumlah }}</span></td>
                        <td>Rp {{ number_format($rekap->total, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($rekap->total / $rekap->jumlah, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection