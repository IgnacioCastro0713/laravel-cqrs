<?php

namespace App\Modules\User\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IUserRepository
{
    public function getAllUsers(): Collection;

    public function getUserById(int $id): ?User;

    public function addUser(array $request): User;

    public function updateUser(User $user, array $request): User;
}
