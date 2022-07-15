<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    public function __construct() {
        $this->code="ERROR-101";
        $this->message="User not found";
        parent::__construct();
    }  
}
