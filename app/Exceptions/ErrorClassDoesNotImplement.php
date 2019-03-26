<?php

namespace App\Exceptions;

use Exception;

class ErrorClassDoesNotImplement extends Exception
{

    /**
     * @var string
     */
    protected $message = 'Error class does not implement';

    /**
     * @var int
     */
    protected $code = 2;

}