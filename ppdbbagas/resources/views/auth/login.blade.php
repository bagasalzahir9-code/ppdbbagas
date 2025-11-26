<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMK BAKTI NUSANTARA 666</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: #0f0f23;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        .aurora {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at top, rgba(0, 255, 146, 0.1) 0%, transparent 70%),
                radial-gradient(ellipse at bottom left, rgba(255, 0, 128, 0.1) 0%, transparent 70%),
                radial-gradient(ellipse at bottom right, rgba(0, 123, 255, 0.1) 0%, transparent 70%);
            animation: aurora 8s ease-in-out infinite;
        }

        @keyframes aurora {
            0%, 100% { opacity: 0.5; transform: rotate(0deg) scale(1); }
            33% { opacity: 0.8; transform: rotate(1deg) scale(1.1); }
            66% { opacity: 0.6; transform: rotate(-1deg) scale(0.9); }
        }

        .login-container {
            background: rgba(15, 15, 35, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 48px;
            width: 90%;
            max-width: 420px;
            position: relative;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 24px;
            padding: 2px;
            background: linear-gradient(45deg, #00ff92, #0070f3, #ff0080, #00ff92);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            animation: borderRotate 4s linear infinite;
        }

        @keyframes borderRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-container {
            position: relative;
            display: inline-block;
            margin-bottom: 24px;
        }

        .logo-ring {
            width: 80px;
            height: 80px;
            border: 2px solid transparent;
            border-radius: 50%;
            background: linear-gradient(45deg, #00ff92, #0070f3, #ff0080) border-box;
            mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            animation: spin 10s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .logo-inner {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #00ff92, #0070f3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 30px rgba(0, 255, 146, 0.3);
        }

        .logo-inner i {
            font-size: 1.8rem;
            color: white;
        }

        .logo-text {
            font-size: 2.2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #00ff92, #0070f3, #ff0080);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
            letter-spacing: -0.02em;
        }

        .logo-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            font-weight: 400;
        }

        .form-title {
            color: white;
            font-size: 1.8rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 8px;
        }

        .form-subtitle {
            color: rgba(255, 255, 255, 0.6);
            text-align: center;
            margin-bottom: 32px;
            font-size: 0.9rem;
        }

        .role-tabs {
            display: flex;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 4px;
            margin-bottom: 32px;
            position: relative;
        }

        .role-tab {
            flex: 1;
            padding: 12px 16px;
            border: none;
            background: transparent;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .role-tab.active {
            color: white;
        }

        .tab-indicator {
            position: absolute;
            top: 4px;
            left: 4px;
            width: calc(50% - 4px);
            height: calc(100% - 8px);
            background: linear-gradient(135deg, #00ff92, #0070f3);
            border-radius: 12px;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(0, 255, 146, 0.3);
        }

        .tab-indicator.admin {
            transform: translateX(100%);
            background: linear-gradient(135deg, #ff0080, #0070f3);
            box-shadow: 0 4px 12px rgba(255, 0, 128, 0.3);
        }

        .input-group {
            margin-bottom: 24px;
        }

        .input-label {
            display: block;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-field {
            width: 100%;
            padding: 16px 20px 16px 48px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .input-field:focus {
            outline: none;
            border-color: #00ff92;
            box-shadow: 0 0 0 3px rgba(0, 255, 146, 0.1);
            background: rgba(255, 255, 255, 0.08);
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .input-field:focus + .input-icon {
            color: #00ff92;
        }

        .login-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #00ff92, #0070f3);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }

        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .login-button:hover::before {
            left: 100%;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 255, 146, 0.3);
        }

        .register-link {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-link a {
            color: #00ff92;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #0070f3;
        }

        .back-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateY(-1px);
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 32px 24px;
                margin: 20px;
            }
            
            .logo-text {
                font-size: 1.8rem;
            }
            
            .form-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="stars"></div>
    <div class="aurora"></div>

    <div class="login-container">
        <div class="logo-section">
            <div class="logo-container">
                <div class="logo-ring">
                    <div class="logo-inner">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
            </div>
            <h1 class="logo-text">SMK BAKTI NUSANTARA 666</h1>
            <p class="logo-subtitle">Penerimaan Peserta Didik Baru</p>
        </div>

        <h2 class="form-title">Welcome Back</h2>
        <p class="form-subtitle">Masuk ke akun Anda untuk melanjutkan</p>

        <div class="role-tabs">
            <div class="tab-indicator" id="tabIndicator"></div>
            <button type="button" class="role-tab active" onclick="setRole('siswa')">
                <i class="fas fa-user-graduate"></i> Siswa
            </button>
            <button type="button" class="role-tab" onclick="setRole('admin')">
                <i class="fas fa-user-shield"></i> Admin
            </button>
        </div>

        <form id="loginForm" method="POST">
            @csrf
            <div class="input-group">
                <label class="input-label" for="email">Email</label>
                <div class="input-wrapper">
                    <input type="email" name="email" id="email" class="input-field" placeholder="Masukkan email Anda" required>
                    <i class="fas fa-envelope input-icon"></i>
                </div>
            </div>

            <div class="input-group">
                <label class="input-label" for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" name="password" id="password" class="input-field" placeholder="Masukkan password Anda" required>
                    <i class="fas fa-lock input-icon"></i>
                </div>
            </div>

            <button type="submit" class="login-button">
                <i class="fas fa-sign-in-alt"></i> Masuk
            </button>

            <div class="register-link" id="registerLink">
                <a href="{{ route('spmb.register') }}">
                    <i class="fas fa-user-plus"></i> Belum punya akun? Daftar sekarang
                </a>
            </div>

            <a href="/" class="back-button">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </form>
    </div>

    <script>
        // Create stars
        function createStars() {
            const starsContainer = document.querySelector('.stars');
            for (let i = 0; i < 100; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                star.style.left = Math.random() * 100 + '%';
                star.style.top = Math.random() * 100 + '%';
                star.style.animationDelay = Math.random() * 3 + 's';
                starsContainer.appendChild(star);
            }
        }

        function setRole(role) {
            const form = document.getElementById('loginForm');
            const registerLink = document.getElementById('registerLink');
            const tabs = document.querySelectorAll('.role-tab');
            const indicator = document.getElementById('tabIndicator');
            
            tabs.forEach(tab => tab.classList.remove('active'));
            event.target.classList.add('active');
            
            if (role === 'admin') {
                form.action = '{{ route("admin.login") }}';
                registerLink.style.display = 'none';
                indicator.classList.add('admin');
            } else {
                form.action = '{{ route("spmb.login") }}';
                registerLink.style.display = 'block';
                indicator.classList.remove('admin');
            }
        }
        
        // Initialize
        document.getElementById('loginForm').action = '{{ route("spmb.login") }}';
        createStars();
        
        // Form submission animation
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = this.querySelector('.login-button');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            btn.disabled = true;
        });
    </script>
</body>
</html>