<?php

namespace App\Listeners\Auth;

use Mail;
use App\Mail\ActivationTokenEmail;
use App\Events\Auth\UserRequestedActivationToken;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailActivationToken
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRequestedActivationToken $event
     *
     * @return void
     */
    public function handle(UserRequestedActivationToken $event)
    {
        if ($event->user->active) {
            return;
        }
        
        Mail::to($event->user)->send(new ActivationTokenEmail($event->user));
    }
}
