<div class="d-flex justify-content-center align-items-center px-4 py-3 bg-light rounded flex-wrap">
    @foreach($orderStatuses as $statusKey => $statusName)
        <div class="d-flex flex-column align-items-center position-relative mx-2" style="flex: 1; min-width: 70px;">
            <!-- Step Circle -->
            <div class="rounded-circle d-flex align-items-center justify-content-center {{ $statusKey <= $currentStatus ? 'bg-success text-white' : 'border border-success text-success bg-white' }}" 
                 style="width: 2.5rem; height: 2.5rem; font-size: 1rem;">
                @if($statusKey <= $currentStatus)
                    <i class="fa fa-check"></i>
                @else
                    {{ $statusKey }}
                @endif
            </div>

            <!-- Connector Line -->
            @if (!$loop->last)
                <div class="position-absolute d-none d-md-block" style="top:30%; left: calc(100% - 17px); width: 100%; height: 2px; background-color: {{ $statusKey < $currentStatus ? '#198754' : '#dee2e6' }};"></div>
            @endif

            <!-- Step Label -->
            <span class="mt-2 text-center text-muted {{ $statusKey <= $currentStatus ? 'text-success fw-bold' : '' }}">
                {{ $statusName }}
            </span>
        </div>
    @endforeach
</div>
