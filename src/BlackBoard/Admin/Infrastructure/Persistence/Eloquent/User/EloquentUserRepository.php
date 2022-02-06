<?php

namespace Admin\Infrastructure\Persistence\Eloquent\User;

use Admin\Domain\Model\User\UserRepository;
use Admin\Domain\Model\User\ValueObject\UserEmail;
use Admin\Domain\Model\User\ValueObject\UserPassword;

class EloquentUserRepository extends EloquentUserMap implements UserRepository
{
    public function authenticate(UserEmail $email, UserPassword $password, bool $remember): void
    {
        $this->connection()->insert(['name' => $email->value()]);
    }
    
    public function logOut(UserEmail $email): void
    {
        // TODO: Implement logOut() method.
    }
}
