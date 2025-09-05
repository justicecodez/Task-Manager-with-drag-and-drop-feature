<!-- Stats Cards -->
<div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card stats-card bg-white shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="card-title text-muted mb-0">Total Tasks</h6>
                                        <h3 class="fw-bold mb-0">{{ $data['count']->total }}</h3>
                                    </div>
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3">
                                        <i class="bi bi-list-task fs-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card stats-card bg-white shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="card-title text-muted mb-0">Completed</h6>
                                        <h3 class="fw-bold mb-0"> {{ $data['count']->done }} </h3>
                                    </div>
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-3">
                                        <i class="bi bi-check2-all fs-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card stats-card bg-white shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="card-title text-muted mb-0">In Progress</h6>
                                        <h3 class="fw-bold mb-0"> {{ $data['count']->pending }} </h3>
                                    </div>
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-3">
                                        <i class="bi bi-arrow-repeat fs-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card stats-card bg-white shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="card-title text-muted mb-0">Due Today</h6>
                                        <h3 class="fw-bold mb-0"> {{ $data['count']->due_today }} </h3>
                                    </div>
                                    <div class="bg-danger bg-opacity-10 text-danger rounded-circle p-3">
                                        <i class="bi bi-clock fs-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>