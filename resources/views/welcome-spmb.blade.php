<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB - SMK BAKTI NUSANTARA 666</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4bb543;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        
        /* Navbar Glassmorphism */
        .navbar {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.85);
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.5rem;
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 5px;
            color: var(--dark);
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            font-weight: 500;
            padding: 8px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
            position: relative;
            z-index: 10;
            cursor: pointer;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #4361ee, #3a0ca3, #7209b7);
            color: white;
            padding: 120px 0 100px;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwMCAxMDAwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0wIDUwMEMwIDIyMy44NTggMjIzLjg1OCAwIDUwMCAwQzc3Ni4xNDIgMCAxMDAwIDIyMy44NTggMTAwMCA1MDBDNTAwIDUwMCAwIDUwMCAwIDUwMFoiIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIi8+PC9zdmc+');
            background-size: cover;
            opacity: 0.1;
        }
        
        .hero-title {
            font-weight: 700;
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .hero-btns .btn {
            margin: 0 10px 10px 0;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 500;
            position: relative;
            z-index: 10;
            cursor: pointer;
            text-decoration: none;
        }
        
        .btn-outline-light {
            border: 2px solid rgba(255, 255, 255, 0.8);
            color: white;
            background: transparent;
        }
        
        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: white;
            color: white;
        }
        
        /* Section Styling */
        section {
            padding: 80px 0;
        }
        
        .section-title {
            font-weight: 700;
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50%;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 2px;
        }
        
        /* Steps Section */
        .step-card {
            background: white;
            border-radius: 15px;
            padding: 30px 20px;
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(67, 97, 238, 0.15);
        }
        
        .step-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 1.8rem;
        }
        
        .step-number {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 30px;
            height: 30px;
            background: var(--accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.8rem;
        }
        
        /* Major Cards */
        .major-card {
            background: white;
            border-radius: 15px;
            padding: 25px 20px;
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .major-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.15);
        }
        
        .major-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 1.5rem;
        }
        
        .major-name {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--dark);
        }
        
        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 60px 0 30px;
        }
        
        .footer-logo {
            font-weight: 700;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 20px;
            display: inline-block;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }
            
            .section-title::after {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">SMK BAKTI NUSANTARA 666</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tata-cara">Tata Cara</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#jurusan">Jurusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-primary" href="{{ route('spmb.login') }}">Login Siswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="hero-title">Penerimaan Peserta Didik Baru (PPDB)</h1>
                    <p class="hero-subtitle">Membuka kesempatan bagi generasi penerus untuk meraih pendidikan terbaik dengan fasilitas modern dan kurikulum terkini.</p>
                    <div class="hero-btns">
                        <a href="{{ route('spmb.register') }}" class="btn btn-primary btn-lg">Daftar Sekarang</a>
                        <a href="#tata-cara" class="btn btn-outline-light btn-lg">Informasi PPDB</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tata Cara Section -->
    <section id="tata-cara" class="bg-light">
        <div class="container">
            <h2 class="section-title text-center">Tata Cara Registrasi</h2>
            <div class="row g-4">
                <div class="col-md-4 col-sm-6">
                    <div class="step-card">
                        <div class="step-icon">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <div class="step-number">1</div>
                        <h4>Buat Akun</h4>
                        <p>Daftarkan diri Anda dengan mengisi formulir pendaftaran online melalui website resmi sekolah.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="step-card">
                        <div class="step-icon">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <div class="step-number">2</div>
                        <h4>Isi Formulir</h4>
                        <p>Lengkapi data diri dan informasi yang diperlukan dengan benar sesuai dengan dokumen asli.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="step-card">
                        <div class="step-icon">
                            <i class="bi bi-cloud-upload"></i>
                        </div>
                        <div class="step-number">3</div>
                        <h4>Upload Berkas</h4>
                        <p>Unggah dokumen persyaratan seperti akta kelahiran, kartu keluarga, dan foto sesuai ketentuan.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="step-card">
                        <div class="step-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="step-number">4</div>
                        <h4>Verifikasi</h4>
                        <p>Tunggu proses verifikasi data dan dokumen oleh panitia PPDB selama 1-3 hari kerja.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="step-card">
                        <div class="step-icon">
                            <i class="bi bi-megaphone"></i>
                        </div>
                        <div class="step-number">5</div>
                        <h4>Pengumuman</h4>
                        <p>Hasil seleksi akan diumumkan melalui website dan dapat diakses dengan login akun pendaftaran.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="step-card">
                        <div class="step-icon">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <div class="step-number">6</div>
                        <h4>Daftar Ulang</h4>
                        <p>Lakukan daftar ulang dengan melunasi biaya pendidikan bagi yang dinyatakan diterima.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jurusan Section -->
    <section id="jurusan">
        <div class="container">
            <h2 class="section-title text-center">Program Jurusan</h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="major-card">
                        <div class="major-icon">
                            <i class="bi bi-laptop"></i>
                        </div>
                        <h4 class="major-name">PPLG</h4>
                        <p>Pengembangan Perangkat Lunak dan Gim. Fokus pada pemrograman, pengembangan aplikasi, dan game development.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="major-card">
                        <div class="major-icon">
                            <i class="bi bi-camera-reels"></i>
                        </div>
                        <h4 class="major-name">ANIMASI</h4>
                        <p>Mempelajari teknik animasi 2D & 3D, visual effects, dan produksi film animasi untuk industri kreatif.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="major-card">
                        <div class="major-icon">
                            <i class="bi bi-calculator"></i>
                        </div>
                        <h4 class="major-name">AKUNTANSI</h4>
                        <p>Akuntansi dan Keuangan Lembaga. Membekali siswa dengan kompetensi di bidang akuntansi dan finansial.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="major-card">
                        <div class="major-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h4 class="major-name">BDP</h4>
                        <p>Bisnis Daring dan Pemasaran. Fokus pada e-commerce, digital marketing, dan manajemen bisnis online.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="major-card">
                        <div class="major-icon">
                            <i class="bi bi-palette"></i>
                        </div>
                        <h4 class="major-name">DKV</h4>
                        <p>Desain Komunikasi Visual. Mempelajari desain grafis, ilustrasi, fotografi, dan media visual kreatif.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="bg-light">
        <div class="container">
            <h2 class="section-title text-center">Kontak Kami</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <h4 class="mb-4">Informasi Kontak</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <i class="bi bi-telephone fs-2 text-primary mb-2"></i>
                                <h5>Telepon</h5>
                                <p>+62 21 1234 5678</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <i class="bi bi-envelope fs-2 text-primary mb-2"></i>
                                <h5>Email</h5>
                                <p>info@smk.sch.id</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('spmb.register') }}" class="btn btn-primary btn-lg me-3">Daftar Sekarang</a>
                            <a href="{{ route('spmb.login') }}" class="btn btn-outline-primary btn-lg">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <a href="#" class="footer-logo">SMK BAKTI NUSANTARA 666</a>
                    <p>Lembaga pendidikan terdepan yang mempersiapkan generasi penerus dengan kompetensi teknologi dan karakter unggul.</p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Menu</h5>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#tata-cara">Tata Cara</a></li>
                        <li><a href="#jurusan">Jurusan</a></li>
                        <li><a href="#kontak">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Layanan</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('spmb.login') }}">Login</a></li>
                        <li><a href="{{ route('spmb.register') }}">Daftar</a></li>
                        <li><a href="{{ route('admin.login') }}">Admin</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Kontak</h5>
                    <p><i class="bi bi-geo-alt me-2"></i> Jl. Pendidikan No. 123, Jakarta Selatan</p>
                    <p><i class="bi bi-telephone me-2"></i> +62 21 1234 5678</p>
                    <p><i class="bi bi-envelope me-2"></i> info@smk.sch.id</p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 SMK BAKTI NUSANTARA 666. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Smooth scrolling for anchor links (only for internal links)
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                // Only prevent default for internal anchor links
                if (href.startsWith('#') && href.length > 1) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.85)';
            }
        });
    </script>
</body>
</html>