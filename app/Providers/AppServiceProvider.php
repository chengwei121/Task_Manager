<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskReminderMail;
use Carbon\Carbon;
use App\Models\Tasks;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            
            // Send Email To Users Who Have Tasks Due In 3 Days
            $taskDueSoon = Tasks::where('due_date', '<=', Carbon::now()->addDays(3))
                                    ->where('due_date', '>',Carbon::now())
                                    ->where('isCompleted',false)
                                    ->get();

            // Send Email To Users Who Have Tasks Is Overdue
            $tasksOverdue = Tasks::where('due_date', '<', Carbon::now())
                                    ->where('isCompleted',false)
                                    ->get();

            foreach ($taskDueSoon as $task) {
                $messageContent = 'Your Task "{$task->title}" is due on "{$task->due_date}" . Please Complete It As Soon As Possible';  
                Mail::to('chengweishia@gmail.com')
                ->send(new TaskReminderMail($task,$messageContent));  
            }

            foreach ($tasksOverdue as $task) {
                $messageContent = 'Your Task "{$task->title}" is due on "{$task->due_date}" . Please Complete It As Soon As Possible';  
                Mail::to('chengweishia@gmail.com')
                ->send(new TaskReminderMail($task,$messageContent));  
            }
            
        })->everyMinute();
    }
}
