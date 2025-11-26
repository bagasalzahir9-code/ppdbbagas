@extends('admin.layout')
@section('title', 'Master Data')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Master Data</h2>
        <p>Kelola jurusan, kuota, gelombang, biaya daftar, syarat berkas, wilayah/kodepos</p>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Kelola Jurusan</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.jurusan.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kuota</label>
                        <input type="number" name="kuota" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Jurusan</button>
                </form>
                
                <hr>
                <h6>Daftar Jurusan</h6>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kuota</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jurusan as $j)
                        <tr>
                            <td>{{ $j->nama_jurusan }}</td>
                            <td>{{ $j->kuota }}</td>
                            <td><span class="badge bg-{{ $j->aktif ? 'success' : 'danger' }}">{{ $j->aktif ? 'Aktif' : 'Nonaktif' }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Kelola Gelombang</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.gelombang.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Gelombang</label>
                        <input type="text" name="nama_gelombang" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Biaya Daftar</label>
                        <input type="number" name="biaya_daftar" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Gelombang</button>
                </form>
                
                <hr>
                <h6>Daftar Gelombang</h6>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Periode</th>
                            <th>Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gelombang as $g)
                        <tr>
                            <td>{{ $g->nama_gelombang }}</td>
                            <td>{{ $g->tanggal_mulai->format('d/m/Y') }} - {{ $g->tanggal_selesai->format('d/m/Y') }}</td>
                            <td>Rp {{ number_format($g->biaya_daftar, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection