<div class="status-timeline">
    @php
        $statuses = [
            'SUBMIT' => 'Dikirim',
            'ADM_PASS' => 'Lulus Administrasi', 
            'PAID' => 'Terbayar',
            'LULUS' => 'Lulus'
        ];
        $currentIndex = array_search($currentStatus, array_keys($statuses));
    @endphp
    
    <div class="timeline-container">
        @foreach($statuses as $status => $label)
            @php
                $index = array_search($status, array_keys($statuses));
                $isActive = $index <= $currentIndex;
                $isCurrent = $status === $currentStatus;
            @endphp
            
            <div class="timeline-item {{ $isActive ? 'active' : '' }} {{ $isCurrent ? 'current' : '' }}">
                <div class="timeline-marker">
                    @if($isActive)
                        <i class="fas fa-check"></i>
                    @else
                        <span>{{ $index + 1 }}</span>
                    @endif
                </div>
                <div class="timeline-content">
                    <h6>{{ $label }}</h6>
                    @if($isCurrent)
                        <small class="text-primary">Status Saat Ini</small>
                    @endif
                </div>
                @if(!$loop->last)
                    <div class="timeline-line {{ $index < $currentIndex ? 'completed' : '' }}"></div>
                @endif
            </div>
        @endforeach
    </div>
</div>

<style>
.status-timeline {
    padding: 20px;
    background: rgba(255,255,255,0.05);
    border-radius: 10px;
    margin: 20px 0;
}

.timeline-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
}

.timeline-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    flex: 1;
}

.timeline-marker {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #6c757d;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: bold;
    margin-bottom: 10px;
    z-index: 2;
}

.timeline-item.active .timeline-marker {
    background: #28a745;
}

.timeline-item.current .timeline-marker {
    background: #007bff;
    animation: pulse 2s infinite;
}

.timeline-content {
    text-align: center;
}

.timeline-line {
    position: absolute;
    top: 20px;
    left: 50%;
    right: -50%;
    height: 2px;
    background: #6c757d;
    z-index: 1;
}

.timeline-line.completed {
    background: #28a745;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.7); }
    70% { box-shadow: 0 0 0 10px rgba(0, 123, 255, 0); }
    100% { box-shadow: 0 0 0 0 rgba(0, 123, 255, 0); }
}
</style>