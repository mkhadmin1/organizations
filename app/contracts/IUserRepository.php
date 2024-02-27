<?php

namespace App\contracts;

use App\Models\User;

interface IUserRepository
{

    public function getUserById(int $userId): ?User;
}
