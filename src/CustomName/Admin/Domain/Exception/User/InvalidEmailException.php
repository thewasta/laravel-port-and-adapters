<?php

namespace Admin\Domain\Exception\User;

class InvalidEmailException extends \DomainException
{
    protected $message = "Given mail is not valid.";
}
