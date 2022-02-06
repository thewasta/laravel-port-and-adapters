<?php

namespace Admin\Application\User;

use Admin\Application\User\Command\UserRegisterCommand;
use Admin\Domain\Service\User\RegisterUser;

class UserRegisterHandler
{
    private RegisterUser $service;
    
    public function __construct(RegisterUser $service)
    {
        $this->service = $service;
    }
    
    public function handle(UserRegisterCommand $command): void
    {
        $this->service->execute($command->email(), $command->password());
    }
}
