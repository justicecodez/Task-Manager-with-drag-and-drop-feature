<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        @include('layout.sidebar')

        <!-- Overlay for mobile -->
        <div class="overlay" id="overlay"></div>

        <!-- Main Content -->
        <div id="content" class="p-4">
            @include('layout.top_nav')
            <!-- Page Content -->
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Task Dashboard</h2>
                    <button class="btn btn-primary d-md-none" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                        <i class="bi bi-plus-circle"></i> Add Task
                    </button>
                </div>
                @include('layout.stats')
                @include('layout.progress')

                <!-- Task List -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Recent Tasks</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @elseif (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Task</th>
                                                <th>Priority</th>
                                                <th>Due Date</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($tasks as $task)
                                                @php
                                                    // Map priorities to colors
                                                    $priorityColors = [
                                                        'high' => 'bg-danger',
                                                        'medium' => 'bg-warning',
                                                        'low' => 'bg-success',
                                                    ];

                                                    // Map categories to colors
                                                    $categoryColors = [
                                                        'work' => 'bg-primary',
                                                        'personal' => 'bg-info',
                                                        'other' => 'bg-warning',
                                                    ];

                                                    // Map statuses to colors
                                                    $statusColors = [
                                                        'done' => 'bg-success',
                                                        'todo' => 'bg-warning',
                                                        'pending' => 'bg-secondary',
                                                    ];
                                                @endphp

                                                <tr>
                                                    <td><span class="text-capitalize"> {{ $task->title }} </span></td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $priorityColors[$task->priority] ?? 'bg-secondary' }}">
                                                            {{ ucfirst($task->priority) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if ($task->due_date->format('Y-m-d') === now()->format('Y-m-d'))
                                                            <p class="text-capitalize text-small">Today</p>
                                                        @elseif($task->due_date->isYesterday())
                                                            <p class="text-capitalize text-small">Yesterday</p>
                                                        @elseif($task->due_date->isTomorrow())
                                                            <p class="text-capitalize text-small">Tomorrow</p>
                                                        @else
                                                            <p>{{ $task->due_date->format('M d, Y') }}</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $categoryColors[$task->category] ?? 'bg-secondary' }} category-badge">
                                                            {{ ucfirst($task->category) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $statusColors[$task->status] ?? 'bg-secondary' }}">
                                                            {{ ucfirst($task->status) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('auth.completed.tasks',['id'=>$task->id]) }}" class="btn btn-sm btn-outline-success">
                                                            <i class="bi bi-check2"></i>
                                                        </a>
                                                        <a href="{{ route('auth.edit.task', ['id'=>$task->id]) }}" class="btn btn-sm btn-outline-primary">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <a href="{{ route('auth.delete.task', ['id'=>$task->id]) }}" class="btn btn-sm btn-outline-danger"><i
                                                                class="bi bi-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>

                                    <div class="d-flex justify-content-end">
                                        {{ $tasks->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout.modal')

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script>
        const create = "{{ route('auth.create.task') }}";
        const update = "{{ route('auth.update.task') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/crud.js') }}"></script>
</body>

</html>
