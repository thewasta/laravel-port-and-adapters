<?php

namespace Admin\Entrypoint\Http\User\Command;

use Admin\Application\Http\User\Command\UserAuthenticationCommand;
use Admin\Application\Http\User\Command\UserLogOutCommand;
use Admin\Application\Http\User\Command\UserRegisterCommand;
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
    
    public function register(Request $request): void
    {
        $faker = \Faker\Factory::create();
        $this->bus->handle(new UserRegisterCommand(
            $faker->name,
            $faker->email,
            'password'
        ));
    }
    
    public function logOut(Request $request): void
    {
        $this->bus->handle(new UserLogOutCommand());
    }
}
