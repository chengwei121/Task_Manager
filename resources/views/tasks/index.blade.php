<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
@extends('layouts.app')

@section('title', 'Task Management')

@push('styles')
<style>
    :root {
        --primary: #6366F1;         /* Indigo 500 - Main brand color */
        --primary-light: #818CF8;   /* Indigo 400 - Lighter shade */
        --secondary: #4F46E5;       /* Indigo 600 - Darker shade */
        --success: #10B981;         /* Emerald 500 - Success actions */
        --success-light: #34D399;   /* Emerald 400 - Lighter success */
        --warning: #F59E0B;         /* Amber 500 - Warning actions */
        --warning-light: #FBBF24;   /* Amber 400 - Lighter warning */
        --danger: #EF4444;          /* Red 500 - Danger/error actions */
        --danger-light: #F87171;    /* Red 400 - Lighter danger */
        --background: #F8FAFC;      /* Slate 50 - Page background */
        --card: #FFFFFF;            /* White - Card background */
        --text: #0F172A;           /* Slate 900 - Primary text */
        --text-light: #64748B;     /* Slate 500 - Secondary text */
        --border: #E2E8F0;         /* Slate 200 - Borders */
        --hover: #F1F5F9;          /* Slate 100 - Hover states */
    }

    /* Enhanced Card Styling */
    .card {
        border: none;
        border-radius: 16px;
        background: var(--card);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card:hover {
        transform: translateY(-4px) scale(1.01);
        box-shadow: 0 20px 25px -5px rgba(99, 102, 241, 0.1), 0 10px 10px -5px rgba(99, 102, 241, 0.04);
    }

    /* Improved Stats Cards */
    .stat-card {
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, rgba(79, 70, 229, 0.1) 0%, rgba(129, 140, 248, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover::before {
        opacity: 1;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        color: white;
        transition: transform 0.3s ease;
    }

    .stat-card:hover .stat-icon {
        transform: scale(1.1) rotate(5deg);
    }

    /* Enhanced Button Styling */
    .btn {
        border-radius: 12px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border: none;
        box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 12px -1px rgba(99, 102, 241, 0.3);
    }

    /* Task Card Animations */
    .task-card {
        position: relative;
        overflow: hidden;
    }

    /* Priority Indicators */
    .priority-indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 8px;
        position: relative;
    }

    .priority-high { background-color: var(--danger); }
    .priority-medium { background-color: var(--warning); }
    .priority-low { background-color: var(--success); }

    /* Improved Search Bar */
    .search-wrapper {
        position: relative;
        margin-bottom: 2rem;
    }

    .search-input {
        padding: 1rem 1rem 1rem 3rem;
        border-radius: 12px;
        border: 2px solid var(--border);
        transition: all 0.3s ease;
        background: var(--card);
    }

    .search-input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
    }

    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-light);
    }

    /* Filter Tags */
    .filter-tag {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        background: var(--card);
        border-radius: 20px;
        margin: 0.25rem;
        font-size: 0.875rem;
        color: var(--text);
        border: 1px solid var(--border);
        transition: all 0.2s ease;
    }

    .filter-tag:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    /* Progress Bars */
    .progress {
        height: 8px;
        border-radius: 4px;
        background-color: var(--border);
        overflow: hidden;
    }

    .progress-bar {
        background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
        transition: width 1s ease-in-out;
    }

    /* Section Headers */
    .section-header {
        position: relative;
        padding-bottom: 1rem;
        margin-bottom: 2rem;
        border-bottom: 2px solid var(--border);
    }

    .section-header::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100px;
        height: 2px;
        background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
    }

    /* Loading Animations */
    .loading {
        background: #f0f0f0;
    }

    /* Dropdown Menus */
    .dropdown-menu {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    /* Task Status Badges */
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .status-badge:hover {
        transform: scale(1.05);
    }

    /* Task Card Specific Styles */
    .task-card {
        border: 1px solid var(--border);
        transition: all 0.3s ease;
    }

    .task-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .task-card .card-title {
        color: var(--text);
        font-weight: 600;
        font-size: 1.1rem;
        line-height: 1.4;
    }

    .task-card .badge {
        font-weight: 500;
        padding: 0.5em 1em;
        border-radius: 20px;
    }

    /* Button Styles */
    .task-card .btn-sm {
        padding: 0.4rem 0.8rem;
        font-size: 0.875rem;
        border-radius: 8px;
    }

    .task-card .btn-group {
        gap: 0.5rem;
    }

    /* Status Toggle Button */
    .task-card .btn-success {
        background: var(--success);
        border-color: var(--success);
    }

    .task-card .btn-outline-success:hover {
        background: var(--success);
        border-color: var(--success);
    }

    /* Priority Badge Positioning */
    .task-card .priority-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
    }

    /* Completed Task Styling */
    .task-card.completed {
        opacity: 0.8;
    }

    .task-card.completed .card-title {
        text-decoration: line-through;
        color: var(--text-light);
    }

    /* Action Buttons Container */
    .task-card .action-buttons {
        display: flex;
        gap: 0.5rem;
        margin-top: auto;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .task-card .action-buttons {
            flex-direction: column;
        }
        
        .task-card .btn-sm {
            width: 100%;
        }
    }

    /* Update status colors */
    .status-badge.status-pending {
        background-color: var(--warning-light);
        color: #92400E;  /* Amber 800 */
    }

    .status-badge.status-completed {
        background-color: var(--success-light);
        color: #065F46;  /* Emerald 800 */
    }

    .status-badge.status-upcoming {
        background-color: var(--danger-light);
        color: #991B1B;  /* Red 800 */
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="position-sticky" style="top: 1rem;">
                <!-- Quick Actions -->
                <div class="d-grid gap-3 mb-4">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus-circle me-2"></i>New Task
                    </a>
                </div>

                <!-- Filters Panel -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4">
                        <h5 class="mb-4 d-flex align-items-center">
                            <i class="fas fa-sliders-h me-2"></i>Filters
                        </h5>
                        <form action="{{ route('tasks.index') }}" method="GET">
                            <div class="vstack gap-3">
                                <!-- Search -->
                                <div class="search-wrapper">
                                    <i class="fas fa-search position-absolute ms-3" style="top: 50%; transform: translateY(-50%)"></i>
                                    <input type="text" name="search" class="form-control form-control-lg ps-5" 
                                           placeholder="Search tasks..." value="{{ request('search') }}">
                                </div>

                                <!-- Priority Filter -->
                                <div>
                                    <label class="form-label text-muted small text-uppercase">Priority</label>
                                    <div class="btn-group w-100" role="group">
                                        <input type="radio" class="btn-check" name="priority" value="high" id="high">
                                        <label class="btn btn-outline-danger" for="high">High</label>
                                        
                                        <input type="radio" class="btn-check" name="priority" value="medium" id="medium">
                                        <label class="btn btn-outline-warning" for="medium">Medium</label>
                                        
                                        <input type="radio" class="btn-check" name="priority" value="low" id="low">
                                        <label class="btn btn-outline-success" for="low">Low</label>
                                    </div>
                                </div>

                                <!-- Status Filter -->
                                <div>
                                    <label class="form-label text-muted small text-uppercase">Status</label>
                                    <select name="status" class="form-select form-select-lg">
                                        <option value="">All Tasks</option>
                                        <option value="pending">Pending</option>
                                        <option value="completed">Completed</option>
                                        <option value="upcoming">Due Soon</option>
                                    </select>
                                </div>

                                <!-- Categories -->
                                <div>
                                    <label class="form-label text-muted small text-uppercase">Categories</label>
                                    <div class="vstack gap-2">
                                        @foreach($categories ?? [] as $category)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="categories[]" 
                                                       value="{{ $category }}" id="cat-{{ $loop->index }}">
                                                <label class="form-check-label" for="cat-{{ $loop->index }}">
                                                    {{ $category }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-dark btn-lg w-100 mt-4">Apply Filters</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Stats Overview -->
            <div class="row g-4 mb-4">
                @foreach([
                    ['total' => $tasks->count(), 'label' => 'Total Tasks', 'icon' => 'tasks', 'color' => 'primary'],
                    ['total' => $tasks->where('isCompleted', true)->count(), 'label' => 'Completed', 'icon' => 'check-circle', 'color' => 'success'],
                    ['total' => $tasks->where('isCompleted', false)->count(), 'label' => 'In Progress', 'icon' => 'clock', 'color' => 'warning'],
                    ['total' => $upcomingTasks->count(), 'label' => 'Due Soon', 'icon' => 'exclamation-circle', 'color' => 'danger']
                ] as $stat)
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="rounded-3 p-3 bg-{{ $stat['color'] }} bg-opacity-10 text-{{ $stat['color'] }}">
                                        <i class="fas fa-{{ $stat['icon'] }} fa-lg"></i>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-muted" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">View Details</a></li>
                                                <li><a class="dropdown-item" href="#">Generate Report</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="mb-1">{{ $stat['total'] }}</h3>
                                <p class="text-muted mb-0">{{ $stat['label'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tasks Grid -->
            <div class="tasks-grid">
                @php
                    $selectedStatus = request('status');
                    
                    // If no status is selected or status is 'all', show everything
                    if (!$selectedStatus || $selectedStatus === 'all') {
                        $displaySections = [
                            'upcoming' => $upcomingTasks,
                            'pending' => $tasks->where('isCompleted', false),
                            'completed' => $tasks->where('isCompleted', true)
                        ];
                    } else {
                        $displaySections = [];
                        // Only add the selected section
                        switch($selectedStatus) {
                            case 'upcoming':
                                $displaySections['upcoming'] = $upcomingTasks;
                                break;
                            case 'pending':
                                $displaySections['pending'] = $tasks->where('isCompleted', false);
                                break;
                            case 'completed':
                                $displaySections['completed'] = $tasks->where('isCompleted', true);
                                break;
                        }
                    }
                @endphp

                @foreach($displaySections as $section => $sectionTasks)
                    @if($sectionTasks->isNotEmpty())
                        <div class="tasks-section mb-4">
                            <h5 class="d-flex align-items-center mb-4">
                                <span class="badge bg-{{ $section === 'upcoming' ? 'danger' : ($section === 'pending' ? 'warning' : 'success') }} p-2 rounded-3 me-2">
                                    <i class="fas fa-{{ $section === 'upcoming' ? 'clock' : ($section === 'pending' ? 'hourglass-half' : 'check-circle') }}"></i>
                                </span>
                                {{ ucfirst($section) }} Tasks
                                <span class="badge bg-secondary ms-2">{{ $sectionTasks->count() }}</span>
                            </h5>

                            <div class="row g-4">
                                @foreach($sectionTasks as $task)
                                    <div class="col-md-6 col-lg-4">
                                        @include('tasks.partials.task-card', ['task' => $task])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Add smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'  
                });
            }
        });
    });
});

// Removed card animations
</script>
@endpush

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
