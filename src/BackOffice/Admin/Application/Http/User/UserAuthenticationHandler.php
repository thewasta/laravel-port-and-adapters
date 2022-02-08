<?php

namespace Admin\Application\Http\User;

use Admin\Application\Http\User\Command\UserAuthenticationCommand;
use Admin\Domain\Service\Http\User\AuthenticateUser;

class UserAuthenticationHandler
{
    private AuthenticateUser $service;
    
    public function __construct(AuthenticateUser $service)
    {
        $this->service = $service;
    }
    
    public function handle(UserAuthenticationCommand $command): bool
    {
        return $this->service->execute($command->email(), $command->password(), $command->remember());
    }
}
