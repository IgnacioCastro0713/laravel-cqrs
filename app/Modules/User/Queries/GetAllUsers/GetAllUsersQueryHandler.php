<?php

namespace App\Modules\User\Queries\GetAllUsers;

use App\Modules\User\Repository\IUserRepository;
use Ecotone\Modelling\Attribute\QueryHandler;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class GetAllUsersQueryHandler
{
    public function __construct(private readonly IUserRepository $userRepository)
    {
    }

    #[QueryHandler]
    public function handle(GetAllUsersQuery $query): Collection
    {
        Log::info("Get all users from database");

        return $this->userRepository->getAllUsers();
    }
}
