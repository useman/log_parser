<?php

namespace App\Exceptions;

use Exception;

class ErrorClassDoesNotExist extends Exception
{

    /**
     * @var string
     */
    protected $message = 'Error class does not exist';

    /**
     * @var int
     */
    protected $code = 1;

}