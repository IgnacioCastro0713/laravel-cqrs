<?php

namespace App\Modules\User\Queries\GetUserById;

use App\Models\User;
use App\Modules\User\Repository\IUserRepository;
use Ecotone\Modelling\Attribute\QueryHandler;
use Illuminate\Support\Facades\Log;

class GetUserByIdQueryHandler
{
    public function __construct(private readonly IUserRepository $userRepository)
    {
    }

    #[QueryHandler]
    public function handle(GetUserByIdQuery $query): ?User
    {
        Log::info("Get user by id from database", ['id' => $query->getId()]);

        return $this->userRepository->getUserById($query->getId());
    }

}
