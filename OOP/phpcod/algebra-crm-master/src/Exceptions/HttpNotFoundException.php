<?php

namespace App\Exceptions;

use Exception;

class HttpNotFoundException extends Exception
{
    public function __construct(string $message = 'Not Found', int $code = 404)
    {
        parent::__construct($message, $code);
    }
}   