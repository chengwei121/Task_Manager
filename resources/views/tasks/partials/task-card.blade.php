<div class="task-card card border-0 shadow-sm h-100 {{ $task->isCompleted ? 'completed' : '' }}">
    <div class="card-body p-4">
        <!-- Task Title -->
        <h5 class="card-title text-dark">{{ $task->title }}</h5>

        <!-- Category -->
        @if($task->category)
            <span class="badge bg-info-subtle text-info rounded-pill mb-2">
                {{ $task->category }}
            </span>
        @endif

        <!-- Due Date -->
        <p class="text-secondary small">
            Due: {{ $task->due_date ? $task->due_date->format('M d, Y') : 'No due date' }}
        </p>

        <!-- Priority -->
        <span class="badge rounded-pill 
            @if($task->priority == 'high') bg-danger-subtle text-danger
            @elseif($task->priority == 'medium') bg-warning-subtle text-warning-emphasis
            @else bg-success-subtle text-success
            @endif">
            {{ ucfirst($task->priority) }}
        </span>

        <!-- Task Actions -->
        <div class="mt-3">
        <form id="complete-task-form-{{ $task->id }}" action="{{ route('tasks.complete', $task->id) }}" method="POST" onsubmit="return confirmCompletion(this, {{ $task->id }}, {{ $task->isCompleted ? 'true' : 'false' }})">
            @csrf
            @method('PATCH')
                <button type="submit" id="complete-task-button-{{ $task->id }}" class="btn btn-sm btn-primary">
                    {{ $task->isCompleted ? 'Mark as Incomplete' : 'Mark as Complete' }}
                     </button>
            </form>

            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger delete-btn">
                    <i class="fas fa-trash me-1"></i>
                    <span class="btn-text">Delete</span>
                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                </button>
            </form>

            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
</div> 

<script>
document.querySelector('.delete-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const button = this.querySelector('.delete-btn');
    const btnText = button.querySelector('.btn-text');
    const spinner = button.querySelector('.spinner-border');
    
    if (confirm('Are you sure you want to delete: {{ $task->title }}?')) {
        button.disabled = true;
        btnText.textContent = 'Please wait...';
        spinner.classList.remove('d-none');
        
        setTimeout(() => {
            this.submit();
        }, 500);
    }
});

function confirmCompletion(form, taskId, isCompleted) {
        const actionText = isCompleted ? "incomplete" : "complete";
        const confirmation = confirm(`Are you sure you want to mark this task as ${actionText}?`);
        if (confirmation) {
            const button = document.getElementById(`complete-task-button-${taskId}`);
            button.disabled = true;
            button.innerHTML = "Please wait...";
            return true; // Proceed with form submission
        } else {
            return false; // Cancel form submission
        }
    }
</script> 