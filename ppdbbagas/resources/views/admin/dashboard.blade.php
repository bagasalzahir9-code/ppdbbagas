<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SMK BAKTI NUSANTARA 666</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
            justify-content: between;
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

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #00ff92, #0070f3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
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
            justify-content: between;
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

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .menu-card {
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .menu-card:hover {
            transform: translateY(-10px);
            border-color: rgba(0, 255, 146, 0.3);
            color: inherit;
        }

        .menu-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            background: linear-gradient(135deg, #00ff92, #0070f3);
            color: white;
        }

        .menu-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .menu-desc {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .logout-btn {
            background: rgba(255, 0, 128, 0.1);
            border: 1px solid rgba(255, 0, 128, 0.3);
            color: #ff0080;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(255, 0, 128, 0.2);
            color: #ff0080;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo-section">
            <div class="logo-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="logo-text">SMK BAKTI NUSANTARA 666</div>
        </div>
        
        <nav class="nav-menu">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.master') }}" class="nav-link">
                    <i class="fas fa-database"></i>
                    Master Data
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.monitoring') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    Monitoring
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.peta') }}" class="nav-link">
                    <i class="fas fa-map"></i>
                    Peta Sebaran
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.laporan') }}" class="nav-link">
                    <i class="fas fa-chart-bar"></i>
                    Laporan
                </a>
            </div>
        </nav>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="welcome-text">
                <h1>Dashboard Admin</h1>
                <p>Selamat datang, {{ auth('admin')->user()->name ?? 'Admin' }}!</p>
            </div>
            <div class="user-info">
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon primary">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $totalPendaftar ?? 0 }}</div>
                <div class="stat-label">Total Pendaftar</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon warning">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $pendingVerifikasi ?? 0 }}</div>
                <div class="stat-label">Pending Verifikasi</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $terverifikasi ?? 0 }}</div>
                <div class="stat-label">Terverifikasi</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon info">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
                <div class="stat-value">5</div>
                <div class="stat-label">Jurusan Tersedia</div>
            </div>
        </div>

        <div class="menu-grid">
            <a href="{{ route('admin.master') }}" class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-database"></i>
                </div>
                <div class="menu-title">Master Data</div>
                <div class="menu-desc">Kelola jurusan, kuota, gelombang, dan biaya pendaftaran</div>
            </a>
            
            <a href="{{ route('admin.monitoring') }}" class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="menu-title">Monitoring Berkas</div>
                <div class="menu-desc">Pantau kelengkapan berkas dan status pendaftar</div>
            </a>
            
            <a href="{{ route('admin.peta') }}" class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-map"></i>
                </div>
                <div class="menu-title">Peta Sebaran</div>
                <div class="menu-desc">Visualisasi sebaran domisili pendaftar</div>
            </a>
            
            <a href="{{ route('admin.laporan') }}" class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="menu-title">Laporan</div>
                <div class="menu-desc">Generate dan download laporan pendaftaran</div>
            </a>
        </div>
    </div>
</body>
</html>