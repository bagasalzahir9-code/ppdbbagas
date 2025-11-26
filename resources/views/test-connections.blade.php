<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Koneksi Button</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Test Koneksi Button PPDB</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Routes untuk Siswa</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('spmb.login') }}" class="btn btn-primary mb-2 d-block">Login Siswa</a>
                        <a href="{{ route('spmb.register') }}" class="btn btn-success mb-2 d-block">Register Siswa</a>
                        <a href="/" class="btn btn-info mb-2 d-block">Welcome Page</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Routes untuk Admin</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.login') }}" class="btn btn-warning mb-2 d-block">Login Admin</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <h5>Status Routes:</h5>
            <ul class="list-group">
                <li class="list-group-item">✅ Welcome Page: <code>/</code></li>
                <li class="list-group-item">✅ Login Siswa: <code>{{ route('spmb.login') }}</code></li>
                <li class="list-group-item">✅ Register Siswa: <code>{{ route('spmb.register') }}</code></li>
                <li class="list-group-item">✅ Login Admin: <code>{{ route('admin.login') }}</code></li>
            </ul>
        </div>
    </div>
</body>
</html>