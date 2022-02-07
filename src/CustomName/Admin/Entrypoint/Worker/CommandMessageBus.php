<?php

namespace Admin\Entrypoint\Worker;

use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Plugins\LockingMiddleware;

class CommandMessageBus
{
    protected CommandBus $bus;
    
    public function __construct()
    {
        $locator = new InMemoryLocator();
        $locator->addHandler(
            new \Admin\Application\Subscriber\UserSendMailHandler(
                new \Admin\Domain\Service\Subscriber\User\UserWelcomeMailSender(
                    new \Shared\Infrastructure\Notification\Mail\MailNotification()
                )
            ),
            \Admin\Application\Subscriber\Command\UserSendMailSubscriberCommand::class
        );
        $this->bus = new CommandBus([
            new LockingMiddleware(),
            new CommandHandlerMiddleware(
                new ClassNameExtractor(),
                $locator,
                new HandleInflector()
            )
        ]);
    }
}
