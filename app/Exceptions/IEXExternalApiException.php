<?php

namespace App\Exceptions;

use Exception;

class IEXExternalApiException extends Exception
{
    /**
     * IEXExternalApiException constructor
     */
    public function __construct($message, $code = 400)
    {
        parent::__construct($message, $code);
    }
}
