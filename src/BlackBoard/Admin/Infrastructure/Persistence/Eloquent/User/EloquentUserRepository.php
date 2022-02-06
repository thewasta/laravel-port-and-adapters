<?php

namespace Admin\Infrastructure\Persistence\Eloquent\User;

use Admin\Domain\Model\User\UserRepository;
use Admin\Domain\Model\User\ValueObject\UserEmail;
use Admin\Domain\Model\User\ValueObject\UserPassword;
use Illuminate\Support\Facades\Auth;

class EloquentUserRepository extends EloquentUserMap implements UserRepository
{
    public function register(UserEmail $email, UserPassword $password): void
    {
        $this->connection()->insert([
            'name' => 'Pablo',
            'email' => $email->value(),
            'password' => bcrypt($password->value())
        ]);
    }
    
    public function authenticate(UserEmail $email, UserPassword $password, bool $remember): void
    {
        Auth::attempt(['email' => $email->value(), 'password' => $password->value()], $remember);
    }
    
    public function logOut(): void
    {
        Auth::logout();
    }
}
