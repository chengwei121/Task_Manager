<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-3 mb-4 d-none d-md-block">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        <h5>Navigation</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('tasks.index') }}">All Tasks</a></li>
                            <li class="list-group-item"><a href="{{ route('tasks.create') }}">Create New Task</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Task List -->
            <div class="col-md-9">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h2 class="h5 mb-0">Task List</h2>
                        <a href="{{ route('tasks.create') }}" class="btn btn-light btn-sm">Create New Task</a>
                    </div>
                    <div class="card-body">
                        <!-- Display success and error messages -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <!-- Pending Tasks -->
                        <h4 class="mt-4">Pending Tasks</h4>
                        <div class="row">
                            @foreach($tasks as $task)
                                @if(!$task->isCompleted)
                                    <div class="col-sm-6 col-md-4 mb-4">
                                        <div class="card border border-warning h-100">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $task->title }}</h5>
                                                <p class="card-text">{{ Str::limit($task->description, 100) }}</p>
                                                <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date }}</p>
                                                <p class="card-text">
                                                    <strong>Status:</strong> 
                                                    <span class="text-warning">Pending</span>
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <form action="{{ route('tasks.done', $task->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="isCompleted" value="1">
                                                        <button type="submit" class="btn btn-success btn-sm" {{ $task->isCompleted ? 'disabled' : '' }}>Complete</button>
                                                    </form>
                                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- Completed Tasks -->
                        <h4 class="mt-4">Completed Tasks</h4>
                        <div class="row">
                            @foreach($tasks as $task)
                                @if($task->isCompleted)
                                    <div class="col-sm-6 col-md-4 mb-4">
                                        <div class="card border border-success h-100">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $task->title }}</h5>
                                                <p class="card-text">{{ Str::limit($task->description, 100) }}</p>
                                                <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date }}</p>
                                                <p class="card-text">
                                                    <strong>Status:</strong> 
                                                    <span class="text-success">Completed</span>
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <button type="submit" class="btn btn-success btn-sm" {{ $task->isCompleted ? 'disabled' : '' }}>Complete</button>
                                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
