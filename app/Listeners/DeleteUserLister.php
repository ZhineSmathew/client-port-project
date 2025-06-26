<?php

namespace App\Listeners;

use App\Events\DeleteUserEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class DeleteUserLister
{
    /**
     * Create the event listener.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DeleteUserEvent $event): void
    {
        Log::info('This user is deleted by SuperAdmin', ['UserName' => $event->user->name]);
    }
}
