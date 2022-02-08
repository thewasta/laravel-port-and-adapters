<?php

namespace Admin\Domain\Exception\User;

class InvalidPasswordException extends \DomainException
{
    protected $message = "The given password doesn't pass validation.";
}
