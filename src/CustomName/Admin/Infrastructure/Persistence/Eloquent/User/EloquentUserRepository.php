<?php

namespace Admin\Infrastructure\Persistence\Eloquent\User;

use Admin\Domain\Model\User\User;
use Admin\Domain\Model\User\UserRepository;
use Admin\Domain\Model\User\ValueObject\UserEmail;
use Admin\Domain\Model\User\ValueObject\UserPassword;
use Illuminate\Support\Facades\Auth;

class EloquentUserRepository extends EloquentUserMap implements UserRepository
{
    public function register(User $user): User
    {
        $this->connection()->insert([
            'name' => $user->name()->value(),
            'email' => $user->email()->value(),
            'password' => bcrypt($user->password()->value())
        ]);
        return $user;
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
