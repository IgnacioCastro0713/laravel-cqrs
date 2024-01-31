<?php

namespace App\Modules\User\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements IUserRepository
{
    public function __construct(private readonly User $user)
    {
    }

    public function getAllUsers(): Collection
    {
        return $this->user->all();
    }

    public function getUserById(int $id): ?User
    {
        return $this->user->find($id);
    }

    public function addUser(array $request): User
    {
        return $this->user->create($request);
    }

    public function updateUser(User $user, array $request): User
    {
        $user->update($request);

        return $user;
    }
}
