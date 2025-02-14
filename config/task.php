<?php

return [
    'reminder_days' => env('TASK_REMINDER_DAYS', 7),
    'max_tasks_per_user' => env('MAX_TASKS_PER_USER', 100),
    'enable_email_notifications' => env('ENABLE_EMAIL_NOTIFICATIONS', true),
]; 