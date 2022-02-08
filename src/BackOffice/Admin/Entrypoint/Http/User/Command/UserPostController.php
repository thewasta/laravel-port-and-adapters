<?php

namespace Admin\Entrypoint\Http\User\Command;

use Admin\Application\Http\User\Command\UserAuthenticationCommand;
use Admin\Application\Http\User\Command\UserLogOutCommand;
use Admin\Application\Http\User\Command\UserRegisterCommand;
use Admin\Entrypoint\Http\User\CommandBusController;
use Illuminate\Http\Request;

class UserPostController extends CommandBusController
{
    public function authenticate(Request $request): bool|\Illuminate\Http\RedirectResponse
    {
        $auth = $this->bus->handle(new UserAuthenticationCommand(
            "bruen.brent@streich.com",
            "password2",
            true));
        if ($auth) {
            return $request->session()->regenerate();
        }
        
        return back(302)->withErrors(['auth' => 'failed to authenticate user']);
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
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
