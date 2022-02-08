<?php

namespace Admin\Domain\Service\Http\User;

use Admin\Domain\Model\User\UserRepository;

class LogOutUser
{
    private UserRepository $repository;
    
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute():void
    {
        $this->repository->logOut();
    }
}
