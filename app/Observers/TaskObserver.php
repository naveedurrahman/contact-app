<?php

namespace App\Observers;

use App\Mail\TaskCreatedMail;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        // $taskable = $task->taskable;

        // $email = null;

        // if ($taskable instanceof \App\Models\Person) {
        //     $email = $taskable->email;
        // }

        // if ($taskable instanceof \App\Models\Business) {
        //     $email = $taskable->contact_email;
        // }

        // if ($email) {
        //     Mail::to($email)->send(new TaskCreatedMail($task));
        // }

        $email = $task->taskable->getEmailForTask();
        if ($email) {
            Mail::to($email)->send(new TaskCreatedMail($task));
        }
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
