<?php

namespace App\Repositories;

use App\Contracts\UserInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    /**
     * @return User|null
     */
    public function getForLogin(): ?User
    {
        return User::where('email', request('email'))->first();
    }
}
