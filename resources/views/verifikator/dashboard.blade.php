<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Verifikator - SMK BAKTI NUSANTARA 666</title>
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
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.5rem;
        }

        .logo-text {
            font-size: 1.2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
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
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
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

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
            border-color: rgba(255, 107, 107, 0.3);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #ff6b6b, #ee5a24, #ff9ff3);
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

        .stat-icon.pending { background: rgba(255, 193, 7, 0.2); color: #ffc107; }
        .stat-icon.verified { background: rgba(40, 167, 69, 0.2); color: #28a745; }
        .stat-icon.rejected { background: rgba(220, 53, 69, 0.2); color: #dc3545; }
        .stat-icon.total { background: rgba(255, 107, 107, 0.2); color: #ff6b6b; }

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
            margin-bottom: 40px;
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
            border-color: rgba(255, 107, 107, 0.3);
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
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
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

        .recent-activity {
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
        }

        .activity-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: #ff6b6b;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1rem;
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .activity-time {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.5);
        }

        .logout-btn {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #dc3545;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
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
                <i class="fas fa-user-check"></i>
            </div>
            <div class="logo-text">Verifikator PPDB</div>
        </div>
        
        <nav class="nav-menu">
            <div class="nav-item">
                <a href="{{ route('verifikator.dashboard') }}" class="nav-link active">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('verifikator.verifikasi') }}" class="nav-link">
                    <i class="fas fa-clipboard-check"></i>
                    Verifikasi Berkas
                </a>
            </div>
        </nav>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="welcome-text">
                <h1>Dashboard Verifikator</h1>
                <p>Selamat datang, {{ auth('admin')->user()->name ?? 'Verifikator' }}!</p>
            </div>
            <div class="user-info">
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
                <div class="user-avatar">
                    <i class="fas fa-user-check"></i>
                </div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon pending">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $pendingVerifikasi }}</div>
                <div class="stat-label">Pending Verifikasi</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon verified">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $terverifikasi }}</div>
                <div class="stat-label">Sudah Terverifikasi</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon rejected">
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $ditolak ?? 0 }}</div>
                <div class="stat-label">Ditolak</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon total">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $total ?? 0 }}</div>
                <div class="stat-label">Total Pendaftar</div>
            </div>
        </div>

        <div class="menu-grid">
            <a href="{{ route('verifikator.verifikasi') }}" class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <div class="menu-title">Verifikasi Berkas</div>
                <div class="menu-desc">Verifikasi kelengkapan berkas dan data pendaftar</div>
            </a>
            
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-history"></i>
                </div>
                <div class="menu-title">Riwayat Verifikasi</div>
                <div class="menu-desc">Lihat riwayat verifikasi yang telah dilakukan</div>
            </div>
        </div>

        <div class="recent-activity">
            <h3 class="activity-title"><i class="fas fa-clock"></i> Aktivitas Terbaru</h3>
            
            <div class="activity-item">
                <div class="activity-icon verified">
                    <i class="fas fa-check"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-text">Verifikasi berkas Ahmad Rizki Pratama - PPLG</div>
                    <div class="activity-time">2 jam yang lalu</div>
                </div>
            </div>
            
            <div class="activity-item">
                <div class="activity-icon verified">
                    <i class="fas fa-check"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-text">Verifikasi berkas Siti Nurhaliza - Akuntansi</div>
                    <div class="activity-time">4 jam yang lalu</div>
                </div>
            </div>
            
            <div class="activity-item">
                <div class="activity-icon rejected">
                    <i class="fas fa-times"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-text">Menolak berkas Budi Santoso - DKV (Berkas tidak lengkap)</div>
                    <div class="activity-time">6 jam yang lalu</div>
                </div>
            </div>
            
            <div class="activity-item">
                <div class="activity-icon verified">
                    <i class="fas fa-check"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-text">Verifikasi berkas Dewi Sartika - Animasi</div>
                    <div class="activity-time">1 hari yang lalu</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>