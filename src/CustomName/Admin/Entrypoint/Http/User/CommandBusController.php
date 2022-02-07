<?php

namespace Admin\Entrypoint\Http\User;

use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use Shared\Entrypoint\Bus\Middleware\DatabaseTransaction;

class CommandBusController extends AdminController
{
    protected CommandBus $bus;
    
    public function __construct()
    {
        $locator = new InMemoryLocator();
        
        $locator->addHandler(
            new \Admin\Application\User\UserAuthenticationHandler(
                new \Admin\Domain\Service\User\AuthenticateUser(
                    new \Admin\Infrastructure\Persistence\Eloquent\User\EloquentUserRepository()
                )
            ),
            \Admin\Application\User\Command\UserAuthenticationCommand::class
        );
        
        $locator->addHandler(
            new \Admin\Application\User\UserRegisterHandler(
                new \Admin\Domain\Service\User\RegisterUser(
                    new \Admin\Infrastructure\Persistence\Eloquent\User\EloquentUserRepository()
                ),
                new \Admin\Infrastructure\Bus\Event\AdminMessageDispatcher()
            ),
            \Admin\Application\User\Command\UserRegisterCommand::class
        );
        
        $locator->addHandler(
            new \Admin\Application\User\UserLogOutHandler(
                new \Admin\Domain\Service\User\LogOutUser(
                    new \Admin\Infrastructure\Persistence\Eloquent\User\EloquentUserRepository()
                )
            ),
            \Admin\Application\User\Command\UserLogOutCommand::class
        );
        $this->bus = new CommandBus([
            new DatabaseTransaction(),
            new CommandHandlerMiddleware(
                new ClassNameExtractor(),
                $locator,
                new HandleInflector()
            ),
        ]);
    }
}
