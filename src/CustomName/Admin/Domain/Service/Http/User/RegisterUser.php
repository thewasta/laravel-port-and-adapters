<?php

namespace Admin\Domain\Service\Http\User;

use Admin\Domain\Event\User\UserRegistered;
use Admin\Domain\Model\User\User;
use Admin\Domain\Model\User\UserRepository;
use Admin\Domain\Model\User\ValueObject\UserEmail;
use Admin\Domain\Model\User\ValueObject\UserName;
use Admin\Domain\Model\User\ValueObject\UserPassword;
use Shared\Domain\Messaging\MessageDispatcher;

class RegisterUser
{
    private UserRepository $repository;
    
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(string $name, string $email, string $password, MessageDispatcher $dispatcher): void
    {
        $user = User::create(UserName::from($name), UserEmail::from($email), UserPassword::from($password));
        $this->repository->register($user);
        $dispatcher->publish(new UserRegistered($user));
    }
}
