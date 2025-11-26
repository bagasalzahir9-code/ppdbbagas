@extends('admin.layout')
@section('title', 'Dashboard Sistem')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Dashboard Sistem (Otomatis)</h2>
        <p>Mengirim notifikasi, mencatat audit log, pembaruan status otomatis</p>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card text-center bg-info text-white">
            <div class="card-body">
                <h3>{{ $total_notifikasi }}</h3>
                <p>Total Notifikasi</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-center bg-success text-white">
            <div class="card-body">
                <h3>{{ $notifikasi_terkirim }}</h3>
                <p>Notifikasi Terkirim</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Pesan Terkirim & Log</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('sistem.notifikasi') }}" class="btn btn-primary btn-lg w-100 mb-2">
                    Kelola Notifikasi
                </a>
            </div>
            <div class="col-md-6">
                <button class="btn btn-success btn-lg w-100 mb-2" onclick="alert('Fitur audit log akan dikembangkan')">
                    Audit Log
                </button>
            </div>
        </div>
    </div>
</div>
@endsection