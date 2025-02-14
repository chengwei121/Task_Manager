@extends('layouts.app')

@section('title', 'Create Task')

@section('styles')
<style>
    /* Modern Glass Effect */
    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Enhanced Gradient Background */
    body {
        background: linear-gradient(135deg, #e0f2fe 0%, #f0f9ff 50%, #e0f7fa 100%);
        min-height: 100vh;
    }

    /* Form Control Updates */
    .form-control {
        border: 2px solid #e2e8f0;
        background: rgba(255, 255, 255, 0.8);
    }

    .form-control:focus {
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.15);
        border-color: #0ea5e9;
        background: white;
    }

    /* Updated Button Styles */
    .btn-create {
        background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
        color: white;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-create:hover {
        background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
        transform: translateY(-1px);
    }

    .btn-back {
        background: linear-gradient(135deg, #64748b 0%, #475569 100%);
        color: white;
        border: none;
    }

    .btn-back:hover {
        background: linear-gradient(135deg, #475569 0%, #334155 100%);
        transform: translateY(-1px);
    }

    /* Form Label Enhancement */
    .form-label {
        color: #0f172a;
    }

    /* Card Header Gradient */
    .gradient-animate {
        background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
    }

    /* Scrollbar Styling */
    textarea::-webkit-scrollbar-thumb {
        background: #94a3b8;
    }
</style>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg glass-card animate-fadeInUp">
                    <div class="card-header py-4 gradient-animate" style="border-radius: 10px 10px 0 0;">
                        <h2 class="mb-0 text-white h4 d-flex align-items-center gap-2 animate-fadeInScale">
                            <i class="fas fa-plus-circle"></i>
                            <span>Create a New Task</span>
                        </h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('tasks.store') }}" method="POST" class="needs-validation stagger" novalidate>
                            @csrf

                            <div class="form-group mb-4 animate-slideInSoft">
                                <label for="title" class="form-label">
                                    <i class="fas fa-heading"></i>
                                    <span>Task Title</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg hover-float focus-glow @error('title') is-invalid @enderror" 
                                       id="title" 
                                       name="title" 
                                       placeholder="Enter a descriptive title"
                                       value="{{ old('title') }}" 
                                       required>
                            </div>

                            <div class="form-group mb-4 animate-slideInSoft">
                                <label for="description" class="form-label">
                                    <i class="fas fa-align-left"></i>
                                    <span>Task Description</span>
                                </label>
                                <textarea class="form-control hover-float focus-glow @error('description') is-invalid @enderror" 
                                          name="description" 
                                          id="description" 
                                          rows="5" 
                                          placeholder="Provide detailed information about the task..."
                                          required>{{ old('description') }}</textarea>
                            </div>
                            
                            <div class="form-group mb-4 animate-slideInSoft">
                                <label for="priority" class="form-label">
                                    <i class="fas fa-flag"></i>
                                    <span>Priority</span>
                                </label>
                                <select class="form-control hover-float focus-glow @error('priority') is-invalid @enderror" 
                                        name="priority" 
                                        id="priority" 
                                        required>
                                    <option value="" disabled selected>Select priority</option>
                                    <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                                    <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                </select>
                            </div>
                            
                            <div class="form-group mb-4 animate-slideInSoft">
                                <label for="due_date" class="form-label">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>Due Date</span>
                                </label>
                                <input type="date" 
                                       class="form-control hover-float focus-glow @error('due_date') is-invalid @enderror" 
                                       name="due_date" 
                                       id="due_date" 
                                       value="{{ old('due_date') }}" 
                                       min="{{ date('Y-m-d') }}" 
                                       required>
                            </div>  


                            <div class="d-grid gap-3 d-md-flex justify-content-md-end mt-4">
                                <a href="{{ route('tasks.index') }}" class="btn btn-modern btn-back hover-gradient btn-animated">
                                    <i class="fas fa-arrow-left me-2"></i>Back to List
                                </a>
                                <button type="submit" class="btn btn-modern btn-create hover-gradient btn-animated">
                                    <i class="fas fa-save me-2"></i>Create Task
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div class="toast show error-shake" role="alert">
                <div class="toast-header bg-danger text-white">
                    <strong class="me-auto">Error</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    Please check the form for errors.
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize stagger animations
        const staggerItems = document.querySelectorAll('.stagger > *');
        staggerItems.forEach((item, index) => {
            item.style.animationDelay = `${index * 0.1}s`;
            item.classList.add('animate-fadeInUp');
        });

        // Form submission animation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.classList.add('loading-pulse');
            submitBtn.disabled = true;
        });

        // Success feedback
        if (document.querySelector('.alert-success')) {
            document.querySelector('.alert-success').classList.add('success-check');
        }
    });
</script>
@endsection
