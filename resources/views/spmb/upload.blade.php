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
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('spmb.upload.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Ijazah/Rapor/KIP/KKS/Akte/KK *</label>
                        <small class="text-muted d-block">Format: PDF, JPG, JPEG. Maksimal 2MB</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Berkas Ijazah *</label>
                        <input type="file" name="berkas_ijazah" class="form-control" accept=".pdf,.jpg,.jpeg" {{ $calonSiswa->berkas_ijazah ? '' : 'required' }}>
                        @if($calonSiswa->berkas_ijazah)
                            <div class="mt-2 p-2 bg-success bg-opacity-10 border border-success rounded">
                                <small class="text-success d-block">✓ {{ basename($calonSiswa->berkas_ijazah) }}</small>
                                <a href="{{ asset($calonSiswa->berkas_ijazah) }}" target="_blank" class="btn btn-sm btn-success mt-1">
                                    <i class="fas fa-eye"></i> Lihat File
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Berkas Rapor *</label>
                        <input type="file" name="berkas_raport" class="form-control" accept=".pdf,.jpg,.jpeg" {{ $calonSiswa->berkas_raport ? '' : 'required' }}>
                        @if($calonSiswa->berkas_raport)
                            <div class="mt-2 p-2 bg-success bg-opacity-10 border border-success rounded">
                                <small class="text-success d-block">✓ {{ basename($calonSiswa->berkas_raport) }}</small>
                                <a href="{{ asset($calonSiswa->berkas_raport) }}" target="_blank" class="btn btn-sm btn-success mt-1">
                                    <i class="fas fa-eye"></i> Lihat File
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Kartu Keluarga *</label>
                        <input type="file" name="berkas_kk" class="form-control" accept=".pdf,.jpg,.jpeg" {{ $calonSiswa->berkas_kk ? '' : 'required' }}>
                        @if($calonSiswa->berkas_kk)
                            <div class="mt-2 p-2 bg-success bg-opacity-10 border border-success rounded">
                                <small class="text-success d-block">✓ {{ basename($calonSiswa->berkas_kk) }}</small>
                                <a href="{{ asset($calonSiswa->berkas_kk) }}" target="_blank" class="btn btn-sm btn-success mt-1">
                                    <i class="fas fa-eye"></i> Lihat File
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">KIP (Opsional)</label>
                        <input type="file" name="berkas_kip" class="form-control" accept=".pdf,.jpg,.jpeg">
                        @if($calonSiswa->berkas_kip)
                            <div class="mt-2 p-2 bg-success bg-opacity-10 border border-success rounded">
                                <small class="text-success d-block">✓ {{ basename($calonSiswa->berkas_kip) }}</small>
                                <a href="{{ asset($calonSiswa->berkas_kip) }}" target="_blank" class="btn btn-sm btn-success mt-1">
                                    <i class="fas fa-eye"></i> Lihat File
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">KKS (Opsional)</label>
                        <input type="file" name="berkas_kks" class="form-control" accept=".pdf,.jpg,.jpeg">
                        @if($calonSiswa->berkas_kks)
                            <div class="mt-2 p-2 bg-success bg-opacity-10 border border-success rounded">
                                <small class="text-success d-block">✓ {{ basename($calonSiswa->berkas_kks) }}</small>
                                <a href="{{ asset($calonSiswa->berkas_kks) }}" target="_blank" class="btn btn-sm btn-success mt-1">
                                    <i class="fas fa-eye"></i> Lihat File
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Akte Kelahiran (Opsional)</label>
                        <input type="file" name="berkas_akte" class="form-control" accept=".pdf,.jpg,.jpeg">
                        @if($calonSiswa->berkas_akte)
                            <div class="mt-2 p-2 bg-success bg-opacity-10 border border-success rounded">
                                <small class="text-success d-block">✓ {{ basename($calonSiswa->berkas_akte) }}</small>
                                <a href="{{ asset($calonSiswa->berkas_akte) }}" target="_blank" class="btn btn-sm btn-success mt-1">
                                    <i class="fas fa-eye"></i> Lihat File
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Upload Berkas</button>
                    <a href="{{ route('spmb.dashboard') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Berkas Terupload</h5>
            </div>
            <div class="card-body">
                @php
                    $berkas = [
                        'berkas_ijazah' => 'Ijazah',
                        'berkas_raport' => 'Rapor', 
                        'berkas_kk' => 'Kartu Keluarga',
                        'berkas_kip' => 'KIP',
                        'berkas_kks' => 'KKS',
                        'berkas_akte' => 'Akte Kelahiran'
                    ];
                    $progress = $calonSiswa->getUploadProgress();
                @endphp
                
                @foreach($berkas as $field => $label)
                    <div class="mb-3 p-2 border rounded">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">{{ $label }}</span>
                            @if($calonSiswa->$field)
                                <span class="badge bg-success">✓</span>
                            @else
                                <span class="badge bg-secondary">-</span>
                            @endif
                        </div>
                        @if($calonSiswa->$field)
                            <div class="mt-2">
                                <a href="{{ asset($calonSiswa->$field) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i> Lihat File
                                </a>
                                <small class="text-muted d-block mt-1">
                                    {{ basename($calonSiswa->$field) }}
                                </small>
                            </div>
                        @else
                            <small class="text-muted">Belum diupload</small>
                        @endif
                    </div>
                @endforeach
                
                <div class="mt-3 p-3 bg-light rounded">
                    <h6>Progress Upload</h6>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-success" style="width: {{ $progress['percentage'] }}%"></div>
                    </div>
                    <small class="text-muted">
                        {{ $progress['required'] + $progress['optional'] }} dari {{ $progress['total_required'] + $progress['total_optional'] }} berkas terupload<br>
                        <strong>Wajib:</strong> {{ $progress['required'] }}/{{ $progress['total_required'] }} | 
                        <strong>Opsional:</strong> {{ $progress['optional'] }}/{{ $progress['total_optional'] }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection