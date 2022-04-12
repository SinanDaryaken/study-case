<?php

namespace App\Contracts;

use App\Models\User;

interface UserInterface
{
    /**
     * @return User|null
     */
    public function getForLogin(): ?User;
}
