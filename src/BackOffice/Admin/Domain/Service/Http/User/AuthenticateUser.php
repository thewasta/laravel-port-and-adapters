<?php

namespace Admin\Domain\Service\Http\User;

use Admin\Domain\Model\User\UserRepository;
use Admin\Domain\Model\User\ValueObject\UserEmail;
use Admin\Domain\Model\User\ValueObject\UserPassword;

class AuthenticateUser
{
    private UserRepository $repository;
    
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(string $email, string $password, bool $remember): bool
    {
        return $this->repository->authenticate(UserEmail::from($email), UserPassword::from($password), $remember);
    }
}
