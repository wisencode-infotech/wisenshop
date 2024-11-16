<?php

namespace App\Services;

use App\Models\User;
use App\Models\Order;

class UserService
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
