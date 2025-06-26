<?php

namespace App\Listeners;

use App\Events\SendNotifiyToUsers;
use App\Models\User;
use App\Notifications\UserStatusNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendUserNotification
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
    public function handle(SendNotifiyToUsers $event): void
    {
        Log::info('Hey, New user is created!',['user' => $event->user->name]);
        $event->user->notify(new UserStatusNotification());
    }
}
