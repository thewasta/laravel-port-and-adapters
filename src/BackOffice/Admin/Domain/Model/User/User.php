<?php

namespace Admin\Domain\Model\User;

use Admin\Domain\Model\User\ValueObject\UserEmail;
use Admin\Domain\Model\User\ValueObject\UserId;
use Admin\Domain\Model\User\ValueObject\UserName;
use Admin\Domain\Model\User\ValueObject\UserPassword;

class User
{
    public UserId $id;
    
    public UserName $name;
    
    public UserEmail $email;
    
    public UserPassword $password;
    
    private function __construct(UserName $name, UserEmail $email, UserPassword $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    
    public static function create(UserName $name, UserEmail $email, UserPassword $password): self
    {
        return new self($name, $email, $password);
    }
    
    public function password(): UserPassword
    {
        return $this->password;
    }
    
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
