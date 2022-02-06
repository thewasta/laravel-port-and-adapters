<?php

namespace Admin\Entrypoint\Http\User\Command;

use Admin\Application\User\Command\UserAuthenticationCommand;
use Admin\Entrypoint\Http\User\CommandBusController;
use Illuminate\Http\Request;

class UserPostController extends CommandBusController
{
    public function authenticate(Request $request): void
    {
        $this->bus->handle(new UserAuthenticationCommand(
            "email@mail.com",
            "password",
            false));
    }
    
    public function logOut(Request $request): void
    {
    
    }
}
