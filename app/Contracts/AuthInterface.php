<?php

namespace App\Contracts;

use App\Models\User;

interface AuthInterface
{
    /**
     * @return ?User
     */
    public function login(): ?User;
}
