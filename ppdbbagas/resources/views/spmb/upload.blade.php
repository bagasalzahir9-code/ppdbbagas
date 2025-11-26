@extends('spmb.layout')
@section('title', 'Upload Berkas')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Upload Berkas</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('spmb.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Ijazah/Rapor/KIP/KKS/Akte/KK *</label>
                        <small class="text-muted d-block">Format: PDF, JPG, JPEG. Maksimal 2MB</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Berkas Ijazah *</label>
                        <input type="file" name="berkas_ijazah" class="form-control" accept=".pdf,.jpg,.jpeg" required>
                        @if($calonSiswa->berkas_ijazah)
                            <small class="text-success">✓ Sudah diupload</small>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Berkas Rapor *</label>
                        <input type="file" name="berkas_raport" class="form-control" accept=".pdf,.jpg,.jpeg" required>
                        @if($calonSiswa->berkas_raport)
                            <small class="text-success">✓ Sudah diupload</small>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Kartu Keluarga *</label>
                        <input type="file" name="berkas_kk" class="form-control" accept=".pdf,.jpg,.jpeg" required>
                        @if($calonSiswa->berkas_kk)
                            <small class="text-success">✓ Sudah diupload</small>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">KIP (Opsional)</label>
                        <input type="file" name="berkas_kip" class="form-control" accept=".pdf,.jpg,.jpeg">
                        @if($calonSiswa->berkas_kip)
                            <small class="text-success">✓ Sudah diupload</small>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">KKS (Opsional)</label>
                        <input type="file" name="berkas_kks" class="form-control" accept=".pdf,.jpg,.jpeg">
                        @if($calonSiswa->berkas_kks)
                            <small class="text-success">✓ Sudah diupload</small>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Akte Kelahiran (Opsional)</label>
                        <input type="file" name="berkas_akte" class="form-control" accept=".pdf,.jpg,.jpeg">
                        @if($calonSiswa->berkas_akte)
                            <small class="text-success">✓ Sudah diupload</small>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Upload Berkas</button>
                    <a href="{{ route('spmb.dashboard') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection