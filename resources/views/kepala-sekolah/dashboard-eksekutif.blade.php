@extends('admin.layout')
@section('title', 'Dashboard Eksekutif')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Dashboard Eksekutif</h2>
        <p>KPI ringkas: pendaftar vs kuota, tren harian, rasio terverifikasi, komposisi asal sekolah/wilayah</p>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-center bg-primary text-white">
            <div class="card-body">
                <h3>{{ $total_pendaftar }}</h3>
                <p>Total Pendaftar</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center bg-info text-white">
            <div class="card-body">
                <h3>{{ $total_kuota }}</h3>
                <p>Total Kuota</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center bg-success text-white">
            <div class="card-body">
                <h3>{{ $rasio_pendaftar }}%</h3>
                <p>Rasio Pendaftar</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center bg-warning text-white">
            <div class="card-body">
                <h3>{{ $rasio_verifikasi }}%</h3>
                <p>Rasio Terverifikasi</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Grafik KPI & Indikator</h5>
            </div>
            <div class="card-body">
                <h6>Tren Harian (7 Hari Terakhir)</h6>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Pendaftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tren_harian as $tren)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($tren->tanggal)->format('d/m/Y') }}</td>
                            <td><span class="badge bg-primary">{{ $tren->jumlah }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Komposisi Asal Sekolah</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Asal Sekolah</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asal_sekolah as $sekolah)
                        <tr>
                            <td>{{ $sekolah->asal_sekolah }}</td>
                            <td><span class="badge bg-success">{{ $sekolah->jumlah }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Komposisi Wilayah</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($wilayah as $w)
                    <div class="col-md-2">
                        <div class="text-center">
                            <h6>{{ $w->kecamatan ?: 'Tidak diisi' }}</h6>
                            <span class="badge bg-info">{{ $w->jumlah }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection