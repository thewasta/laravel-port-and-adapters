<?php

namespace Admin\Domain\Model\User;

use Admin\Domain\Model\User\ValueObject\UserEmail;
use Admin\Domain\Model\User\ValueObject\UserPassword;

interface UserRepository
{
    public function register(User $user): User;
    
    public function authenticate(UserEmail $email, UserPassword $password, bool $remember): bool;
    
    public function logOut(): void;
}
