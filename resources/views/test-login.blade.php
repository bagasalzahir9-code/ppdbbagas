<!DOCTYPE html>
<html>
<head>
    <title>Test Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Test Login Admin</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" value="admin@test.com" required>
                        </div>
                        <div class="mb-3">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" value="admin123" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    
                    <hr>
                    <p><strong>Login Credentials:</strong></p>
                    <p><strong>Admin:</strong> admin@test.com / admin123</p>
                    <p><strong>Verifikator:</strong> verifikator@test.com / verif123</p>
                    <p><strong>Kepala Sekolah:</strong> kepsek@test.com / kepsek123</p>
                    
                    <div class="mt-3">
                        <button type="button" class="btn btn-info btn-sm" onclick="setVerifikator()">Set Verifikator</button>
                        <button type="button" class="btn btn-success btn-sm" onclick="setKepsek()">Set Kepala Sekolah</button>
                    </div>
                    
                    <script>
                    function setVerifikator() {
                        document.querySelector('input[name="email"]').value = 'verifikator@test.com';
                        document.querySelector('input[name="password"]').value = 'verif123';
                    }
                    function setKepsek() {
                        document.querySelector('input[name="email"]').value = 'kepsek@test.com';
                        document.querySelector('input[name="password"]').value = 'kepsek123';
                    }
                    
                    // Auto refresh page setiap 10 menit untuk mencegah CSRF expired
                    setTimeout(function() {
                        location.reload();
                    }, 600000);
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>