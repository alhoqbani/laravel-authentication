<?php

namespace App\Events\Auth;

use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class UserRequestedActivationToken
{
    use Dispatchable, SerializesModels;
    /**
     * @var \App\User
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param \App\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
