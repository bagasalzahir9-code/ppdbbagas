<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SPMB</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            width: 90%;
            max-width: 1200px;
            height: 600px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .image-side {
            flex: 1;
            background-size: cover;
            background-position: center;
        }

        .left-image {
            background-image: url('https://source.unsplash.com/random/800x600/?students');
        }

        .right-image {
            background-image: url('https://source.unsplash.com/random/800x600/?graduation');
        }

        .form-container {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-title {
            margin-bottom: 30px;
            text-align: center;
            color: #333;
            font-size: 28px;
            font-weight: 600;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
            font-weight: 500;
        }

        .input-group input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-color: #4facfe;
            box-shadow: 0 0 0 2px rgba(79, 172, 254, 0.2);
            outline: none;
        }

        .login-btn {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
            width: 100%;
            margin-bottom: 15px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
        }

        .link-btn {
            color: #4facfe;
            text-decoration: none;
            text-align: center;
            display: block;
            margin-bottom: 10px;
        }

        .back-btn {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 25px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            display: block;
        }

        @media (max-width: 992px) {
            .container {
                flex-direction: column;
                height: auto;
            }
            
            .image-side {
                height: 200px;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-side left-image"></div>
        <div class="form-container">
            <h1 class="form-title">Login SPMB</h1>
            <form method="POST" action="{{ route('spmb.login') }}">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan email Anda" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password Anda" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
                <a href="{{ route('spmb.register') }}" class="link-btn">Belum punya akun? Daftar</a>
                <a href="/" class="back-btn">Kembali</a>
            </form>
        </div>
        <div class="image-side right-image"></div>
    </div>
</body>
</html>