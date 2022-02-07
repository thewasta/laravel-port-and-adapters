<?php

namespace Admin\Application\Http\User\Command;

class UserAuthenticationCommand
{
    private string  $email, $password;

    private bool $remember;

    public function __construct(string $email, string $password, bool $remember)
    {
        $this->email = $email;
        $this->password = $password;
        $this->remember = $remember;
    }

    public function email():? string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function remember(): bool
    {
        return $this->remember;
    }
}
