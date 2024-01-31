<?php

namespace App\Modules\User\Commands\AddUser;

class AddUserCommand
{
    public function __construct(private readonly AddUserRequest $request)
    {
    }

    public function getRequest(): AddUserRequest
    {
        return $this->request;
    }
}
