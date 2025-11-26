<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Sebaran - SMK BAKTI NUSANTARA 666</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-section">
            <div class="logo-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="logo-text">PPDB SMK</div>
        </div>
        
        <nav class="nav-menu">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.master-spmb') }}" class="nav-link">
                    <i class="fas fa-database"></i>
                    Master Data
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.monitoring') }}" class="nav-link">
                    <i class="fas fa-eye"></i>
                    Monitoring
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.peta') }}" class="nav-link active">
                    <i class="fas fa-map-marked-alt"></i>
                    Peta Sebaran
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.laporan') }}" class="nav-link">
                    <i class="fas fa-file-alt"></i>
                    Laporan
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="welcome-text">
                <h1>Peta Sebaran Pendaftar</h1>
                <p>Visualisasi geografis distribusi calon siswa berdasarkan domisili</p>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon primary">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $statistik['total'] }}</div>
                <div class="stat-label">Total Lokasi</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon info">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $statistik['per_jurusan']->count() }}</div>
                <div class="stat-label">Jurusan Tersebar</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon warning">
                        <i class="fas fa-city"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $statistik['per_kecamatan']->count() }}</div>
                <div class="stat-label">Kecamatan</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon success">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="stat-value">{{ collect($markers)->count() }}</div>
                <div class="stat-label">Pendaftar Terplot</div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-container">
            <div class="map-header">
                <h3><i class="fas fa-map"></i> Peta Interaktif Sebaran Pendaftar</h3>
                <div class="map-controls">
                    <button class="control-btn" onclick="toggleLayer('all')">
                        <i class="fas fa-eye"></i> Semua
                    </button>
                    <button class="control-btn" onclick="toggleLayer('lulus')">
                        <i class="fas fa-check"></i> Lulus
                    </button>
                    <button class="control-btn" onclick="toggleLayer('pending')">
                        <i class="fas fa-clock"></i> Pending
                    </button>
                </div>
            </div>
            <div id="map" style="height: 500px; border-radius: 15px;"></div>
        </div>

        <!-- Statistics Section -->
        <div class="statistics-section">
            <div class="stat-container">
                <div class="stat-header">
                    <h3><i class="fas fa-chart-pie"></i> Distribusi per Jurusan</h3>
                </div>
                <div class="stat-content">
                    @foreach($statistik['per_jurusan'] as $jurusan)
                    <div class="stat-item">
                        <div class="stat-info">
                            <span class="stat-name">{{ $jurusan->jurusan->nama_jurusan ?? 'Belum Pilih' }}</span>
                            <span class="stat-count">{{ $jurusan->jumlah }} siswa</span>
                        </div>
                        <div class="stat-bar">
                            <div class="stat-progress" style="width: {{ ($jurusan->jumlah / $statistik['total']) * 100 }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="stat-container">
                <div class="stat-header">
                    <h3><i class="fas fa-map-marked"></i> Distribusi per Wilayah</h3>
                </div>
                <div class="stat-content">
                    @foreach($statistik['per_kecamatan'] as $wilayah)
                    <div class="stat-item">
                        <div class="stat-info">
                            <span class="stat-name">{{ $wilayah->wilayah->kecamatan ?? 'Tidak Diketahui' }}</span>
                            <span class="stat-count">{{ $wilayah->jumlah }} siswa</span>
                        </div>
                        <div class="stat-bar">
                            <div class="stat-progress" style="width: {{ ($wilayah->jumlah / $statistik['total']) * 100 }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
// Initialize map
const map = L.map('map').setView([-6.2088, 106.8456], 11); // Jakarta coordinates

// Add tile layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Markers data from backend
const markersData = @json($markers);

// Create marker groups
const allMarkers = L.layerGroup();
const lulusMarkers = L.layerGroup();
const pendingMarkers = L.layerGroup();

// Add markers to map
markersData.forEach(function(marker) {
    const icon = L.divIcon({
        className: 'custom-marker',
        html: `<div class="marker-icon ${getMarkerClass(marker.status)}">
                <i class="fas fa-user"></i>
               </div>`,
        iconSize: [30, 30],
        iconAnchor: [15, 15]
    });

    const leafletMarker = L.marker([marker.lat, marker.lng], {icon: icon})
        .bindPopup(`
            <div class="marker-popup">
                <h6>${marker.nama}</h6>
                <p><strong>Jurusan:</strong> ${marker.jurusan}</p>
                <p><strong>Status:</strong> ${marker.status}</p>
                <p><strong>Wilayah:</strong> ${marker.wilayah}</p>
            </div>
        `);

    allMarkers.addLayer(leafletMarker);
    
    if (marker.status === 'LULUS') {
        lulusMarkers.addLayer(leafletMarker);
    } else {
        pendingMarkers.addLayer(leafletMarker);
    }
});

// Add all markers by default
allMarkers.addTo(map);

function getMarkerClass(status) {
    switch(status) {
        case 'LULUS': return 'marker-success';
        case 'PAID': return 'marker-primary';
        case 'ADM_PASS': return 'marker-info';
        default: return 'marker-warning';
    }
}

function toggleLayer(type) {
    map.eachLayer(function(layer) {
        if (layer !== map._layers[Object.keys(map._layers)[0]]) { // Keep tile layer
            map.removeLayer(layer);
        }
    });

    switch(type) {
        case 'all':
            allMarkers.addTo(map);
            break;
        case 'lulus':
            lulusMarkers.addTo(map);
            break;
        case 'pending':
            pendingMarkers.addTo(map);
            break;
    }
}
</script>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: #0f0f23;
    color: #ffffff;
    min-height: 100vh;
}

.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 280px;
    height: 100vh;
    background: rgba(15, 15, 35, 0.95);
    backdrop-filter: blur(20px);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    padding: 30px 0;
    z-index: 1000;
}

.logo-section {
    text-align: center;
    padding: 0 30px 40px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.logo-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #00ff92, #0070f3);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    font-size: 1.5rem;
}

.logo-text {
    font-size: 1.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #00ff92, #0070f3);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.nav-menu {
    padding: 30px 0;
}

.nav-item {
    margin: 5px 20px;
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 15px 20px;
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.nav-link:hover, .nav-link.active {
    background: rgba(0, 255, 146, 0.1);
    color: #00ff92;
    transform: translateX(5px);
}

.nav-link i {
    width: 20px;
    margin-right: 15px;
    font-size: 1.1rem;
}

.main-content {
    margin-left: 280px;
    padding: 30px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
    background: rgba(15, 15, 35, 0.6);
    backdrop-filter: blur(20px);
    padding: 20px 30px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.welcome-text h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.welcome-text p {
    color: rgba(255, 255, 255, 0.6);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

.stat-card {
    background: rgba(15, 15, 35, 0.6);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 30px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    border-color: rgba(0, 255, 146, 0.3);
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #00ff92, #0070f3, #ff0080);
}

.stat-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
}

.stat-icon.primary { background: rgba(0, 255, 146, 0.2); color: #00ff92; }
.stat-icon.warning { background: rgba(255, 0, 128, 0.2); color: #ff0080; }
.stat-icon.info { background: rgba(0, 112, 243, 0.2); color: #0070f3; }
.stat-icon.success { background: rgba(0, 255, 146, 0.2); color: #00ff92; }

.stat-value {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 5px;
}

.stat-label {
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.9rem;
}

.map-container {
    background: rgba(15, 15, 35, 0.6);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 20px;
    margin-bottom: 30px;
}

.map-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.map-header h3 {
    font-size: 1.3rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 10px;
}

.map-controls {
    display: flex;
    gap: 10px;
}

.control-btn {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.control-btn:hover {
    background: rgba(0, 255, 146, 0.2);
    border-color: #00ff92;
}

.statistics-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.stat-container {
    background: rgba(15, 15, 35, 0.6);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 20px;
}

.stat-container .stat-header {
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.stat-container .stat-header h3 {
    font-size: 1.2rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.stat-item {
    margin-bottom: 15px;
}

.stat-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 5px;
}

.stat-name {
    font-weight: 500;
}

.stat-count {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.9rem;
}

.stat-bar {
    height: 6px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    overflow: hidden;
}

.stat-progress {
    height: 100%;
    background: linear-gradient(90deg, #00ff92, #0070f3);
    border-radius: 3px;
    transition: width 0.3s ease;
}

/* Custom marker styles */
.custom-marker {
    background: transparent;
    border: none;
}

.marker-icon {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 12px;
    border: 2px solid white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.3);
}

.marker-success { background: #28a745; }
.marker-primary { background: #007bff; }
.marker-info { background: #17a2b8; }
.marker-warning { background: #ffc107; color: #000; }

.marker-popup {
    font-family: 'Inter', sans-serif;
}

.marker-popup h6 {
    margin: 0 0 10px 0;
    font-weight: 600;
    color: #333;
}

.marker-popup p {
    margin: 5px 0;
    font-size: 0.9rem;
    color: #666;
}

#map {
    z-index: 1;
}
</style>

</body>
</html>