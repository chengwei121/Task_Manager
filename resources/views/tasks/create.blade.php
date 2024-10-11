@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <div class="container mt-4">
        <!-- Task Form Card -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2>Create a New Task</h2>
            </div>
            <div class="card-body">
                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Display success message -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('tasks.addTask') }}" method="POST">
                    @csrf

                    <!-- Task Title Input -->
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Task Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter task title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Task Description Input -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Task Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5" placeholder="Describe the task..." required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Task Due Date Input -->
                    <div class="form-group mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control @error('due_date') is-invalid @enderror" name="due_date" id="due_date" value="{{ old('due_date') }}" required>
                        @error('due_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success mt-3">Create Task</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Back to Task List</a>
                </form>
            </div>
        </div>
    </div>
@endsection
