<?php

namespace Admin\Application\Http\User\Command;

class UserRegisterCommand
{
    private string $email;
    
    private string $password;
    
    private string $name;
    
    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function name(): string
    {
        return $this->name;
    }
    
    public function email(): string
    {
        return $this->email;
    }
    
    public function password(): string
    {
        return $this->password;
    }
}
