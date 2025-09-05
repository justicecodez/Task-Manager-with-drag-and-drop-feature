<div id="sidebar" class="text-white">
            <div class="p-3">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none">
                    <i class="bi bi-check2-square fs-4"></i>
                    <span class="ms-2 fs-4">Task Manager</span>
                </a>
            </div>
            <hr class="text-white-50">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('auth.dashboard') }}" class="nav-link active" aria-current="page">
                        <i class="bi bi-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('auth.task') }}" class="nav-link text-white">
                        <i class="bi bi-list-task"></i>
                        <span>My Tasks</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('auth.logout') }}" class="nav-link text-white">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </li>
               
            </ul>
            <hr>
            
        </div>