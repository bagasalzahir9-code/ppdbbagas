@extends('admin.layout')
@section('title', 'Master Data')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2>Master Data</h2>
                <p>Kelola data referensi sistem SPMB</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-graduation-cap fa-3x mb-3 text-primary"></i>
                <h6>Jurusan</h6>
                <p class="small">Kelola data jurusan</p>
                <button class="btn btn-primary btn-sm">Kelola</button>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-users fa-3x mb-3 text-success"></i>
                <h6>Kuota</h6>
                <p class="small">Atur kuota per jurusan</p>
                <button class="btn btn-success btn-sm">Kelola</button>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-calendar fa-3x mb-3 text-warning"></i>
                <h6>Gelombang</h6>
                <p class="small">Kelola gelombang pendaftaran</p>
                <button class="btn btn-warning btn-sm">Kelola</button>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-money-bill fa-3x mb-3 text-info"></i>
                <h6>Biaya</h6>
                <p class="small">Atur biaya pendaftaran</p>
                <button class="btn btn-info btn-sm">Kelola</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Data Jurusan</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Jurusan</th>
                            <th>Kuota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jurusan as $j)
                        <tr>
                            <td>{{ $j->id }}</td>
                            <td>{{ $j->nama_jurusan }}</td>
                            <td>{{ $j->kuota }}</td>
                            <td><button class="btn btn-sm btn-primary">Edit</button></td>
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
                <h5>Pengaturan Biaya</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Jenis Biaya</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Biaya Pendaftaran</td>
                            <td>Rp 200.000</td>
                            <td><button class="btn btn-sm btn-warning">Edit</button></td>
                        </tr>
                        <tr>
                            <td>Biaya Daftar Ulang</td>
                            <td>Rp 500.000</td>
                            <td><button class="btn btn-sm btn-warning">Edit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection