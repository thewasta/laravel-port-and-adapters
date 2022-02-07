<?php

namespace Admin\Application\Http\User;

use Admin\Application\Http\User\Command\UserRegisterCommand;
use Admin\Domain\Service\Http\User\RegisterUser;
use Shared\Domain\Messaging\MessageDispatcher;

class UserRegisterHandler
{
    private RegisterUser $service;
    
    private MessageDispatcher $dispatcher;
    
    public function __construct(RegisterUser $service, MessageDispatcher $dispatcher)
    {
        $this->service = $service;
        $this->dispatcher = $dispatcher;
    }
    
    public function handle(UserRegisterCommand $command): void
    {
        $this->service->execute($command->name(), $command->email(), $command->password(), $this->dispatcher);
        $this->dispatcher->notify();
    }
}
