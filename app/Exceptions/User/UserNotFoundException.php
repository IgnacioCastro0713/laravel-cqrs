<?php

namespace App\Exceptions\User;

use App\Exceptions\AppException;
use Symfony\Component\HttpFoundation\Response;

class UserNotFoundException extends AppException
{
    public function __construct($value)
    {
        parent::__construct(
            "User not found with the value: " . print_r($value, true),
            Response::HTTP_NOT_FOUND
        );
    }
}
