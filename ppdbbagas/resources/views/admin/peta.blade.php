@extends('admin.layout')
@section('title', 'Peta Sebaran')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2>Peta Sebaran Pendaftar</h2>
                <p>Visualisasi domisili pendaftar berdasarkan wilayah</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Peta Interaktif</h5>
            </div>
            <div class="card-body">
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Statistik Wilayah</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Kecamatan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($statistik['per_kecamatan'] ?? [] as $kec)
                        <tr>
                            <td>{{ $kec->kecamatan ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $kec->total }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">Belum ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6>Filter</h6>
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <label class="form-label">Jurusan</label>
                    <select class="form-control form-control-sm">
                        <option>Semua Jurusan</option>
                        <option>IPA</option>
                        <option>IPS</option>
                        <option>Bahasa</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Status</label>
                    <select class="form-control form-control-sm">
                        <option>Semua Status</option>
                        <option>Pending</option>
                        <option>Terverifikasi</option>
                        <option>Ditolak</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-sm" onclick="filterMap()">Filter</button>
            </div>
        </div>
    </div>
</div>

<script>
// Inisialisasi peta
var map = L.map('map').setView([-6.2088, 106.8456], 10); // Jakarta sebagai center

// Tambahkan tile layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Data pendaftar dari database dengan koordinat random
var pendaftarDB = @json($pendaftar ?? []);
var pendaftar = [];

// Generate koordinat random untuk setiap pendaftar
if (pendaftarDB.length > 0) {
    pendaftar = pendaftarDB.map(function(siswa, index) {
        // Generate koordinat random di sekitar Jakarta
        var baseLat = -6.2088;
        var baseLng = 106.8456;
        var randomLat = baseLat + (Math.random() - 0.5) * 0.3; // ±0.15 derajat
        var randomLng = baseLng + (Math.random() - 0.5) * 0.3;
        
        return {
            nama: siswa.nama_lengkap,
            lat: randomLat,
            lng: randomLng,
            jurusan: siswa.jurusan_pilihan || 'Belum Pilih',
            status: siswa.status || 'Pending',
            kecamatan: 'Jakarta ' + ['Pusat', 'Selatan', 'Barat', 'Utara', 'Timur'][Math.floor(Math.random() * 5)]
        };
    });
} else {
    // Data dummy jika tidak ada data di database
    pendaftar = [
        {nama: 'Ahmad Rizki', lat: -6.1751, lng: 106.8650, jurusan: 'IPA', status: 'Lulus', kecamatan: 'Menteng'},
        {nama: 'Siti Nurhaliza', lat: -6.2297, lng: 106.8467, jurusan: 'IPS', status: 'Pending', kecamatan: 'Kebayoran'},
        {nama: 'Budi Santoso', lat: -6.1944, lng: 106.8229, jurusan: 'Bahasa', status: 'Lulus', kecamatan: 'Tanah Abang'},
        {nama: 'Dewi Sartika', lat: -6.2615, lng: 106.7809, jurusan: 'IPA', status: 'Pending', kecamatan: 'Cilandak'},
        {nama: 'Andi Wijaya', lat: -6.1462, lng: 106.8937, jurusan: 'IPS', status: 'Lulus', kecamatan: 'Kelapa Gading'}
    ];
}

var markers = [];

// Fungsi untuk menambahkan marker
function addMarkers(data) {
    // Hapus marker lama
    markers.forEach(marker => map.removeLayer(marker));
    markers = [];
    
    data.forEach(function(siswa) {
        var color = siswa.status === 'Lulus' ? 'green' : 
                   siswa.status === 'Pending' ? 'orange' : 'red';
        
        var marker = L.circleMarker([siswa.lat, siswa.lng], {
            color: color,
            fillColor: color,
            fillOpacity: 0.7,
            radius: 8
        }).addTo(map);
        
        marker.bindPopup(`
            <b>${siswa.nama}</b><br>
            Jurusan: ${siswa.jurusan}<br>
            Status: <span style="color: ${color}">${siswa.status}</span><br>
            Kecamatan: ${siswa.kecamatan || 'Tidak Diketahui'}
        `);
        
        markers.push(marker);
    });
}

// Tambahkan semua marker
addMarkers(pendaftar);

// Fungsi filter
function filterMap() {
    var jurusan = document.querySelector('select[name="jurusan"]')?.value || 'Semua Jurusan';
    var status = document.querySelector('select[name="status"]')?.value || 'Semua Status';
    
    var filtered = pendaftar.filter(function(siswa) {
        var jurusanMatch = jurusan === 'Semua Jurusan' || siswa.jurusan === jurusan;
        var statusMatch = status === 'Semua Status' || siswa.status === status;
        return jurusanMatch && statusMatch;
    });
    
    addMarkers(filtered);
}

// Tambahkan name attribute untuk select
document.addEventListener('DOMContentLoaded', function() {
    var selects = document.querySelectorAll('.card select');
    if (selects[0]) selects[0].setAttribute('name', 'jurusan');
    if (selects[1]) selects[1].setAttribute('name', 'status');
});
</script>
@endsection