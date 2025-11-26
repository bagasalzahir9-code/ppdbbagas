<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMK BAKTI NUSANTARA 666</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <!-- Background Animation -->
        <div class="bg-animation">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
        </div>

        <!-- Login Card -->
        <div class="login-card">
            <!-- Logo Section -->
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h1 class="logo-text">PPDB SMK</h1>
                <p class="logo-subtitle">SMK BAKTI NUSANTARA 666</p>
            </div>

            <!-- Login Form -->
            <div class="login-form">
                <div class="form-header">
                    <h2>Masuk ke Admin Panel</h2>
                    <p>Silakan masukkan kredensial Anda untuk mengakses sistem</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}" class="form">
                    @csrf
                    
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i>
                            Email
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-input" 
                            placeholder="Masukkan email Anda"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i>
                            Password
                        </label>
                        <div class="password-input">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="form-input" 
                                placeholder="Masukkan password Anda"
                                required
                            >
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye" id="password-icon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="checkbox-container">
                            <input type="checkbox" name="remember">
                            <span class="checkmark"></span>
                            Ingat saya
                        </label>
                        <a href="#" class="forgot-link">Lupa password?</a>
                    </div>

                    <button type="submit" class="login-btn">
                        <i class="fas fa-sign-in-alt"></i>
                        Masuk
                    </button>
                </form>

                <!-- Quick Login Options -->
                <div class="quick-login">
                    <p class="quick-title">Login Cepat:</p>
                    <div class="quick-buttons">
                        <a href="/login-admin" class="quick-btn admin">
                            <i class="fas fa-user-shield"></i>
                            Admin
                        </a>
                        <a href="/login-verifikator" class="quick-btn verifikator">
                            <i class="fas fa-user-check"></i>
                            Verifikator
                        </a>
                        <a href="/login-keuangan" class="quick-btn keuangan">
                            <i class="fas fa-calculator"></i>
                            Keuangan
                        </a>
                        <a href="/login-kepsek" class="quick-btn kepsek">
                            <i class="fas fa-user-tie"></i>
                            Kepala Sekolah
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="login-footer">
                <p>&copy; 2024 SMK BAKTI NUSANTARA 666. Sistem PPDB Online.</p>
            </div>
        </div>

        <!-- Info Panel -->
        <div class="info-panel">
            <div class="info-content">
                <h3>Sistem PPDB Online</h3>
                <p>Platform terintegrasi untuk mengelola penerimaan peserta didik baru dengan fitur lengkap dan modern.</p>
                
                <div class="features">
                    <div class="feature-item">
                        <i class="fas fa-users"></i>
                        <span>Manajemen Pendaftar</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard Analytics</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>Peta Sebaran</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-file-export"></i>
                        <span>Export Laporan</span>
                    </div>
                </div>

                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Pendaftar</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">5</div>
                        <div class="stat-label">Jurusan</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Kepuasan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }

        // Form animation on load
        document.addEventListener('DOMContentLoaded', function() {
            const loginCard = document.querySelector('.login-card');
            const infoPanel = document.querySelector('.info-panel');
            
            setTimeout(() => {
                loginCard.classList.add('animate-in');
                infoPanel.classList.add('animate-in');
            }, 100);
        });
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
            min-height: 100vh;
            overflow-x: hidden;
        }

        .login-container {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        /* Background Animation */
        .bg-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(0, 255, 146, 0.1), rgba(0, 112, 243, 0.1));
            animation: float 6s ease-in-out infinite;
        }

        .shape-1 {
            width: 200px;
            height: 200px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .shape-3 {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        .shape-4 {
            width: 120px;
            height: 120px;
            top: 30%;
            right: 40%;
            animation-delay: 1s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Login Card */
        .login-card {
            flex: 1;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
            position: relative;
            z-index: 1;
            background: rgba(15, 15, 35, 0.8);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease;
        }

        .login-card.animate-in {
            opacity: 1;
            transform: translateX(0);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #00ff92, #0070f3);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: white;
            box-shadow: 0 10px 30px rgba(0, 255, 146, 0.3);
        }

        .logo-text {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #00ff92, #0070f3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 5px;
        }

        .logo-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
            font-weight: 500;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-header p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
        }

        .alert {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-error {
            background: rgba(255, 0, 128, 0.1);
            border: 1px solid rgba(255, 0, 128, 0.3);
            color: #ff0080;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #00ff92;
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(0, 255, 146, 0.1);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .password-input {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            padding: 5px;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #00ff92;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .checkbox-container input {
            margin-right: 8px;
        }

        .forgot-link {
            color: #00ff92;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #0070f3;
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #00ff92, #0070f3);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 255, 146, 0.3);
        }

        .quick-login {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .quick-title {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            margin-bottom: 15px;
            text-align: center;
        }

        .quick-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .quick-btn {
            padding: 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.85rem;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .quick-btn:hover {
            background: rgba(0, 255, 146, 0.1);
            border-color: #00ff92;
            color: #00ff92;
            transform: translateY(-1px);
        }

        .login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-footer p {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
        }

        /* Info Panel */
        .info-panel {
            flex: 1;
            background: linear-gradient(135deg, rgba(0, 255, 146, 0.1), rgba(0, 112, 243, 0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            z-index: 1;
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s ease 0.2s;
        }

        .info-panel.animate-in {
            opacity: 1;
            transform: translateX(0);
        }

        .info-content {
            max-width: 500px;
            text-align: center;
        }

        .info-content h3 {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #00ff92, #0070f3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .info-content > p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 40px;
        }

        .features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 40px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        .feature-item i {
            width: 40px;
            height: 40px;
            background: rgba(0, 255, 146, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #00ff92;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            gap: 20px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #00ff92;
            margin-bottom: 5px;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            
            .login-card, .info-panel {
                flex: none;
            }
            
            .info-panel {
                padding: 20px;
            }
            
            .features {
                grid-template-columns: 1fr;
            }
            
            .quick-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>
</body>
</html>