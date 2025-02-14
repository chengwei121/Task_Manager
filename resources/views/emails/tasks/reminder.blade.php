@component('mail::message')
# Task Due Reminder

Hello,

Your task "**{{ $task->title }}**" is due soon on **{{ $task->due_date->format('Y-m-d') }}**.

**Task Details:**
- Priority: {{ ucfirst($task->priority) }}
- Category: {{ $task->category ?? 'Uncategorized' }}
- Description: {{ $task->description }}

@component('mail::button', ['url' => route('tasks.edit', $task->id)])
View Task
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent 