@extends('spmb.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cetak Dokumen</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('spmb.kartu.cetak') }}" class="btn btn-primary btn-block mb-3">
                                <i class="fas fa-print"></i> Cetak Kartu Peserta
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('spmb.bukti-bayar.cetak') }}" class="btn btn-success btn-block mb-3">
                                <i class="fas fa-print"></i> Cetak Bukti Bayar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection