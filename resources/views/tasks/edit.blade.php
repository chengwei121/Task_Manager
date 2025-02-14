@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2>Edit Task</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" id="updateTaskForm">
                    @csrf
                    @method('PUT')

                    <!-- Add this for debugging -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Task Title Input -->
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Task Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $task->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Task Description Input -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Task Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5" required>{{ old('description', $task->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Task Due Date Input -->
                    <div class="form-group mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control @error('due_date') is-invalid @enderror" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}" min="{{ date('Y-m-d') }}" required>
                        @error('due_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Update Submit Button -->
                    <button type="button" class="btn btn-success" id="updateBtn" onclick="confirmUpdate()">Update Task</button>
                    <button type="button" class="btn btn-success d-none" id="loadingBtn" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Please wait...
                    </button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Task List</a>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>

    @push('scripts')
    <script>
    function confirmUpdate() {
        if (confirm('Are you sure you want to update this task?')) {
            // Show loading button and hide update button
            document.getElementById('updateBtn').classList.add('d-none');
            document.getElementById('loadingBtn').classList.remove('d-none');
            
            // Submit the form
            document.getElementById('updateTaskForm').submit();
        }
    }
    </script>
    @endpush
@endsection
