<?php

namespace Admin\Application\User;

use Admin\Application\User\Command\UserAuthenticationCommand;
use Admin\Domain\Service\User\AuthenticateUser;

class UserAuthenticationHandler
{
    private AuthenticateUser $service;
    
    public function __construct(AuthenticateUser $service)
    {
        $this->service = $service;
    }
    
    public function handle(UserAuthenticationCommand $command): void
    {
        $this->service->execute($command->email(), $command->password(), $command->remember());
    }
}
