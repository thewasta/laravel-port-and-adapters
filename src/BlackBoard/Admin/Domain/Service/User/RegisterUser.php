<?php

namespace Admin\Domain\Service\User;

use Admin\Domain\Model\User\UserRepository;
use Admin\Domain\Model\User\ValueObject\UserEmail;
use Admin\Domain\Model\User\ValueObject\UserPassword;

class RegisterUser
{
    private UserRepository $repository;
    
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(string $email, string $password): void
    {
        $this->repository->register(UserEmail::from($email), UserPassword::from($password));
    }
}
