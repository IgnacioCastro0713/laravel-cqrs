<?php

namespace App\Modules\User\Commands\UpdateUser;

use App\Exceptions\User\UserNotFoundException;
use App\Models\User;
use App\Modules\User\Repository\IUserRepository;
use Ecotone\Modelling\Attribute\CommandHandler;
use Illuminate\Support\Facades\Log;

class UpdateUserCommandHandler
{
    public function __construct(private readonly IUserRepository $userRepository)
    {
    }

    #[CommandHandler]
    public function handle(UpdateUserCommand $command): User
    {
        $request = $command->getRequest();

        Log::info("Update user into database", ['request' => $request->all(), 'id' => $command->getId()]);

        $user = $this->userRepository->getUserById($command->getId());

        throw_if(!$user, new UserNotFoundException($command->getId()));

        return $this->userRepository->updateUser($user, $request->only('name'));
    }
}
