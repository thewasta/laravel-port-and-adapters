<?php

namespace Admin\Application\Http\User;

use Admin\Domain\Service\Http\User\LogOutUser;

class UserLogOutHandler
{
    private LogOutUser $service;
    
    public function __construct(LogOutUser $service)
    {
        $this->service = $service;
    }
    
    public function handle(): void
    {
        $this->service->execute();
    }
}
