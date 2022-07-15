<?php

namespace App\Exceptions;

use Exception;

class AuthenticationException extends Exception
{
    public function __construct() {
        $this->code="ERROR-100";
        $this->message="Authentication faild";
        parent::__construct();
    }      
}
