<?php

namespace studyhub\Events;

use studyhub\Entities\Users\User;
use Illuminate\Queue\SerializesModels;

class UserHasRegistered extends Event
{
    use SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
