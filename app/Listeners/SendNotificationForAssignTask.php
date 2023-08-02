<?php

namespace App\Listeners;

use App\Events\AssignUserToTaskEvent;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AssignTaskToUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendNotificationForAssignTask
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AssignUserToTaskEvent $event): void
    {
        Notification::send($event->user, new AssignTaskToUserNotification($event->task));
    }
}
