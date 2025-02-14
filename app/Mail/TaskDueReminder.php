<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Tasks;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskDueReminder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $task;
    public $tries = 3;
    public $timeout = 30;

    public function __construct(Tasks $task)
    {
        $this->task = $task;
    }

    public function build()
    {
        return $this->markdown('emails.tasks.reminder')
                    ->subject('Task Due Reminder: ' . $this->task->title);
    }
} 