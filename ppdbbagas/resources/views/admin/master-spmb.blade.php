<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data SPMB - SMK BAKTI NUSANTARA 666</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <a href="{{ route('admin.master-spmb') }}" class="nav-link active">
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
                <a href="{{ route('admin.peta') }}" class="nav-link">
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
                <h1>Master Data SPMB</h1>
                <p>Kelola data lengkap sistem PPDB dengan interface modern</p>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon primary">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $jurusan->count() }}</div>
                <div class="stat-label">Total Jurusan</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon info">
                        <i class="fas fa-calendar"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $gelombang->count() }}</div>
                <div class="stat-label">Gelombang Aktif</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon warning">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $admin->count() }}</div>
                <div class="stat-label">Total Admin</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $jurusan->sum('kuota') }}</div>
                <div class="stat-label">Total Kuota</div>
            </div>
        </div>

        <div class="custom-tabs">
            <button class="tab-btn active" onclick="showTab('jurusan')">
                <i class="fas fa-graduation-cap"></i>
                Jurusan
            </button>
            <button class="tab-btn" onclick="showTab('gelombang')">
                <i class="fas fa-calendar"></i>
                Gelombang
            </button>
            <button class="tab-btn" onclick="showTab('admin')">
                <i class="fas fa-users-cog"></i>
                Admin
            </button>
        </div>

        <div id="jurusan-tab" class="tab-content">
            <div class="content-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-graduation-cap"></i>
                        Data Jurusan
                    </h3>
                    <button class="add-btn" onclick="addJurusan()">
                        <i class="fas fa-plus"></i>
                        Tambah Jurusan
                    </button>
                </div>
                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Jurusan</th>
                                <th>Kuota</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jurusan as $j)
                            <tr>
                                <td>{{ $j->id }}</td>
                                <td>{{ $j->nama_jurusan }}</td>
                                <td>{{ $j->kuota }}</td>
                                <td>
                                    @if($j->aktif)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="gelombang-tab" class="tab-content" style="display: none;">
            <div class="content-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar"></i>
                        Data Gelombang
                    </h3>
                    <button class="add-btn" onclick="addGelombang()">
                        <i class="fas fa-plus"></i>
                        Tambah Gelombang
                    </button>
                </div>
                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Nama Gelombang</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Biaya</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gelombang as $g)
                            <tr>
                                <td>{{ $g->nama_gelombang }}</td>
                                <td>{{ $g->tanggal_mulai->format('d M Y') }}</td>
                                <td>{{ $g->tanggal_selesai->format('d M Y') }}</td>
                                <td>Rp {{ number_format($g->biaya_daftar, 0, ',', '.') }}</td>
                                <td>
                                    @if($g->aktif)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="admin-tab" class="tab-content" style="display: none;">
            <div class="content-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users-cog"></i>
                        Data Admin
                    </h3>
                    <button class="add-btn" onclick="addAdmin()">
                        <i class="fas fa-plus"></i>
                        Tambah Admin
                    </button>
                </div>
                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admin as $a)
                            <tr>
                                <td>{{ $a->nama }}</td>
                                <td>{{ $a->email }}</td>
                                <td>
                                    <span class="badge bg-info">{{ ucfirst($a->role) }}</span>
                                </td>
                                <td>
                                    @if($a->aktif)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script>
function showTab(tabName) {
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.style.display = 'none';
    });
    
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    document.getElementById(tabName + '-tab').style.display = 'block';
    event.target.classList.add('active');
}

function addJurusan() {
    alert('Form tambah jurusan akan ditampilkan');
}

function addGelombang() {
    alert('Form tambah gelombang akan ditampilkan');
}

function addAdmin() {
    alert('Form tambah admin akan ditampilkan');
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

.custom-tabs {
    background: rgba(15, 15, 35, 0.6);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 0.5rem;
    margin-bottom: 2rem;
    display: flex;
    gap: 0.5rem;
    overflow-x: auto;
}

.tab-btn {
    background: transparent;
    border: none;
    color: rgba(255, 255, 255, 0.7);
    padding: 1rem 1.5rem;
    border-radius: 15px;
    font-weight: 600;
    transition: all 0.3s ease;
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.tab-btn.active {
    background: linear-gradient(135deg, #00ff92, #0070f3);
    color: white;
    transform: translateY(-2px);
}

.tab-btn:hover:not(.active) {
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff;
}

.content-card {
    background: rgba(15, 15, 35, 0.6);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 2rem;
    animation: slideUp 0.6s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.card-header {
    background: rgba(255, 255, 255, 0.05);
    padding: 1.5rem 2rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-title {
    font-size: 1.3rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.add-btn {
    background: linear-gradient(135deg, #00ff92, #0070f3);
    border: none;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.add-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

.table-container {
    padding: 2rem;
    overflow-x: auto;
}

.custom-table {
    width: 100%;
    border-collapse: collapse;
}

.custom-table th {
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff;
    padding: 1rem;
    text-align: left;
    font-weight: 600;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.custom-table td {
    padding: 1rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    color: rgba(255, 255, 255, 0.8);
}

.custom-table tr:hover {
    background: rgba(255, 255, 255, 0.05);
}

.btn-action {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 500;
    margin: 0 0.25rem;
    transition: all 0.3s ease;
}

.btn-edit {
    background: rgba(0, 112, 243, 0.2);
    color: #0070f3;
    border: 1px solid rgba(0, 112, 243, 0.3);
}

.btn-delete {
    background: rgba(255, 0, 128, 0.2);
    color: #ff0080;
    border: 1px solid rgba(255, 0, 128, 0.3);
}

.btn-action:hover {
    transform: translateY(-2px);
}

.badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.bg-success {
    background: rgba(0, 255, 146, 0.2);
    color: #00ff92;
}

.bg-danger {
    background: rgba(255, 0, 128, 0.2);
    color: #ff0080;
}

.bg-info {
    background: rgba(0, 112, 243, 0.2);
    color: #0070f3;
}
</style>

</body>
</html>