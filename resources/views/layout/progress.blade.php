<!-- Progress Section -->
<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Task Progress</h5>
            </div>
            @php
                $overall= round((intval($data['count']->total)/intval($data['count']->total))*100);
                $work= round((intval($data['count']->work)/intval($data['count']->total))*100);
                $personal= round((intval($data['count']->personal)/intval($data['count']->total))*100);
                $shopping= round((intval($data['count']->shopping)/intval($data['count']->total))*100);
            @endphp
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Overall Completion</span>
                    <span>{{ $overall }}%</span>
                </div>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $overall }}%"
                        aria-valuenow="{{ $overall }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Work Tasks</span>
                    <span>{{ $work }}%</span>
                </div>
                <div class="progress mb-4">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $work }}%"
                        aria-valuenow="{{ $work }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Personal Tasks</span>
                    <span>{{ $personal }}%</span>
                </div>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $personal }}%"
                        aria-valuenow="{{ $personal }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Shopping Tasks</span>
                    <span>{{ $shopping }}%</span>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar"
                        style="width: {{ $shopping }}%" aria-valuenow="{{ $shopping }}"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Task Distribution</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 150px; height: 150px;">
                        <div class="text-center">
                            <h4 class="mb-0">{{ $data['count']->total }}</h4>
                            <small>Total Tasks</small>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="d-flex align-items-center mb-2">
                        <div class="bg-primary rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                        <span class="me-auto">Work</span>
                        <span>{{ $data['count']->work }} tasks</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="bg-info rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                        <span class="me-auto">Personal</span>
                        <span>{{ $data['count']->personal }} tasks</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="bg-warning rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                        <span class="me-auto">Shopping</span>
                        <span>{{ $data['count']->shopping }} tasks</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
