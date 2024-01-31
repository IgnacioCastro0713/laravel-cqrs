<?php

namespace App\Modules\User\Commands\UpdateUser;

class UpdateUserCommand
{
    public function __construct(private readonly UpdateUserRequest $request, private readonly int $id)
    {
    }

    public function getRequest(): UpdateUserRequest
    {
        return $this->request;
    }

    public function getId(): int
    {
        return $this->id;
    }

}
