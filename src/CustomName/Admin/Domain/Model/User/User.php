<?php

namespace Admin\Domain\Model\User;

use Admin\Domain\Model\User\ValueObject\UserEmail;
use Admin\Domain\Model\User\ValueObject\UserId;
use Admin\Domain\Model\User\ValueObject\UserName;

class User
{
    public UserId $id;
    
    public UserName $name;
    
    public UserEmail $email;
    
    public function id(): UserId
    {
        return $this->id;
    }
    
    public function name(): UserName
    {
        return $this->name;
    }
    
    public function email(): UserEmail
    {
        return $this->email;
    }
}
