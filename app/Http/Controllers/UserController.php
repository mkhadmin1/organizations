<?php

namespace App\Http\Controllers;

use App\contracts\IUserRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private IUserRepository $repository;
    public function __construct() {
        $this->repository = new UserRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var User $users */

        $users = $this->repository->getUsers();

        return $users;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): UserResource
    {

        /** @var User $user */

        $user = User::create($request->validated());

        return new UserResource($user);

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): UserResource
    {
        $user = $this->repository->getUserById($id);
//        if ($user == null) {
//            return response()->json([
//                'message' => 'Пользователь не найден'
//            ], 400);
//        }

        /** @var User $user */
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateUserRequest $request
     * @param User $user
     * @return UserResource
     */
    public function update(UpdateUserRequest $request, User $user): UserResource
    {
        $user->update($request->validated());

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /** @var User $user */

        $user = User::query()->find($id);
        if ($user === null) {
            return response()->json([
                'message' => 'Запись не найдена.'
            ]);
        }
        $user->delete();

        return response()->json([
            'message' => 'Запись была успешно удалена.'
        ]);
    }
}
