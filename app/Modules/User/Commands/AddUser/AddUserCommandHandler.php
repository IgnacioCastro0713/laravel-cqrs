<?php

namespace App\Modules\User\Commands\AddUser;

use App\Models\User;
use App\Modules\User\Repository\IUserRepository;
use Ecotone\Modelling\Attribute\CommandHandler;
use Illuminate\Support\Facades\Log;

class AddUserCommandHandler
{
    public function __construct(private readonly IUserRepository $userRepository)
    {
    }

    #[CommandHandler]
    public function handle(AddUserCommand $command): User
    {
        $request = $command->getRequest();

        Log::info("Add new user into database", $request->all());

        $request->merge([
            'password' => bcrypt($request->get('password')),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return $this->userRepository->addUser($request->all());
    }
}
