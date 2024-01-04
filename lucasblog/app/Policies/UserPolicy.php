<?php

namespace App\Policies;

use App\Http\Middleware\Authenticate;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }

    public function create(Authenticatable $user)
    {
        return $user->role === 'admin';
    }
}
