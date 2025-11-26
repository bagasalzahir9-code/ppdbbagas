@extends('admin.layout')
@section('title', 'Peta Sebaran')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Peta Sebaran Pendaftar</h2>
        <p>Peta titik domisili pendaftar per kecamatan/kelurahan/jurusan</p>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Map Interaktif + Agregasi</h5>
    </div>
    <div class="card-body">
        <div id="map" style="height: 400px; background: #f0f0f0; border: 1px solid #ccc; display: flex; align-items: center; justify-content: center;">
            <div class="text-center">
                <h5>Peta Sebaran Pendaftar</h5>
                <p>Integrasi dengan Google Maps/Leaflet akan ditampilkan di sini</p>
                <small class="text-muted">Total Lokasi: {{ $pendaftar->count() }} titik</small>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-6">
                <h6>Sebaran per Kecamatan</h6>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Kecamatan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $kecamatan_count = $pendaftar->groupBy('kecamatan')->map->count()->sortDesc();
                        @endphp
                        @foreach($kecamatan_count->take(10) as $kecamatan => $count)
                        <tr>
                            <td>{{ $kecamatan ?: 'Tidak diisi' }}</td>
                            <td><span class="badge bg-primary">{{ $count }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h6>Sebaran per Jurusan</h6>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Jurusan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $jurusan_count = $pendaftar->groupBy('jurusan_pilihan')->map->count()->sortDesc();
                        @endphp
                        @foreach($jurusan_count as $jurusan => $count)
                        <tr>
                            <td>{{ $jurusan ?: 'Belum pilih' }}</td>
                            <td><span class="badge bg-success">{{ $count }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection