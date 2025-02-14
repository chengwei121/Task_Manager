<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tasks;
use Carbon\Carbon;
use App\Mail\TaskDueReminder;
use Illuminate\Support\Facades\Mail;

class SendTaskReminders extends Command
{
    protected $signature = 'tasks:send-reminders';
    protected $description = 'Send reminders for tasks due soon';

    public function handle()
    {
        $tasks = Tasks::with('user')
            ->where('due_date', '>=', Carbon::now())
            ->where('due_date', '<=', Carbon::now()->addDays(7))
            ->where('isCompleted', false)
            ->get();

        foreach ($tasks as $task) {
            Mail::to($task->user->email)->send(new TaskDueReminder($task));
            $this->info("Reminder sent for task: {$task->title}");
        }
    }
} 