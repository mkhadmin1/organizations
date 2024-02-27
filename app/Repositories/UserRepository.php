<?php

namespace App\Repositories;

use App\contracts\IUserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class UserRepository implements IUserRepository
{
    public function getUsers(): JsonResponse  {
        /** @var User $users */
        $users = User::all();
        return response()->json([
            'data' => $users
        ]);
    }
    public function getUserById(int $userId): ?User
    {

        /** @var User $user */
        $user = User::query()->find($userId);

        return $user;
    }
}
