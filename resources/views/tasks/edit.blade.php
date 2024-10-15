@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2>Edit Task</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

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

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success">Update Task</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Task List</a>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection
