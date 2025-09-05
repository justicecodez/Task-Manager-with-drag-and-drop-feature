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
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>Edit Task</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('auth.update.task') }}" method="POST">
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @csrf
                                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                                    <div class="mb-3">
                                        <label for="taskTitle" class="form-label">Task Title</label>
                                        <input type="text" name="title" class="form-control" required id="taskTitle"
                                            value="{{ $task->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="taskDescription" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" required id="taskDescription" rows="3">{{ $task->description }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="taskDueDate" class="form-label">Due Date</label>
                                            <input type="date" name="due_date" required class="form-control"
                                                id="taskDueDate" value="{{ $task->due_date->format('Y-m-d') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="taskPriority" class="form-label">Priority</label>
                                            <select name="priority" required class="form-select" id="taskPriority">
                                                <option value="" disabled>Select priority</option>
                                                <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low
                                                </option>
                                                <option value="medium"
                                                    {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                                <option value="high"
                                                    {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                                            </select>   
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="taskCategory" class="form-label">Category</label>
                                            <select name="category" required class="form-select" id="taskCategory">
                                                <option value="" disabled>Select category</option>
                                                <option value="work"
                                                    {{ $task->category == 'work' ? 'selected' : '' }}>Work</option>
                                                <option value="personal"
                                                    {{ $task->category == 'personal' ? 'selected' : '' }}>Personal
                                                </option>
                                                <option value="shopping"
                                                    {{ $task->category == 'shopping' ? 'selected' : '' }}>Shopping
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="taskStatus" class="form-label">Status</label>
                                            <select name="status" required required class="form-select" id="taskStatus">
                                                <option value="" disabled>Select status</option>
                                                <option value="todo"
                                                    {{ $task->status == 'todo' ? 'selected' : '' }}>Todo</option>
                                                <option value="pending"
                                                    {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="done"
                                                    {{ $task->status == 'done' ? 'selected' : '' }}>Completed
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button type="submit" class="btn btn-primary">Update Task</button>
                                    </div>
                                </form>
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
