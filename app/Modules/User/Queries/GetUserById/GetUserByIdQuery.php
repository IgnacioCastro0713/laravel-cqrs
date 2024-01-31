<?php

namespace App\Modules\User\Queries\GetUserById;

class  GetUserByIdQuery
{
    public function __construct(private readonly int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
