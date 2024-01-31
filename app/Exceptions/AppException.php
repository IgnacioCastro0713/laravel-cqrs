<?php

namespace App\Exceptions;


use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class AppException extends HttpException
{

    public function __construct(string $message, int $statusCode, Throwable $previous = null, array $headers = [], int $code = 0)
    {
        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }
}
