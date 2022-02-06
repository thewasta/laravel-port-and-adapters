<?php

namespace Admin\Entrypoint\Http\User;

use Admin\Entrypoint\Bus\Middleware\DatabaseLogger;
use Admin\Infrastructure\Persistence\Eloquent\User\EloquentUserRepository;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use Shared\Entrypoint\Bus\Middleware\DatabaseTransaction;
use Shared\Infrastructure\Bus\Logger\DataLogger;

class CommandBusController extends AdminController
{
    protected CommandBus $bus;
    
    public function __construct()
    {
        $locator = new InMemoryLocator();
        
        $locator->addHandler(
            new \Admin\Application\User\UserAuthenticationHandler(
                new \Admin\Domain\Service\User\AuthenticateUser(
                    new EloquentUserRepository()
                )
            ),
            \Admin\Application\User\Command\UserAuthenticationCommand::class
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
