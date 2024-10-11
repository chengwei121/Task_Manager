<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Task Tracker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/tasks') }}">
                        <i class="bi bi-list-check"></i> Tasks
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('create') }}">
                        <i class="bi bi-plus-circle"></i> Create Task
                    </a>
                </li>                
            </ul>
        </div>
    </div>
</nav>

<!-- Add Bootstrap Icons CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    .navbar {
        background-color: #f8f9fa; /* Light background color */
    }

    .nav-link {
        transition: color 0.3s;
    }

    .nav-link:hover {
        color: #007bff; /* Change color on hover */
        text-decoration: underline; /* Underline effect on hover */
    }

    .navbar-brand {
        color: #343a40; /* Darker color for brand */
    }

    .navbar-brand:hover {
        color: #007bff; /* Change color on hover */
    }
</style>
