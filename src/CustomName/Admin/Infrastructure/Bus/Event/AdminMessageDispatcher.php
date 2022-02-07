<?php

namespace Admin\Infrastructure\Bus\Event;

use Illuminate\Contracts\Container\Container as ContainerContract;
use Illuminate\Contracts\Queue\Factory as QueueFactoryContract;
use Illuminate\Support\Facades\App;
use Shared\Domain\Messaging\Event;
use Shared\Domain\Messaging\MessageDispatcher;
use Shared\Entrypoint\Bus\Event\AggregateMessageDispatcher;

class AdminMessageDispatcher extends AggregateMessageDispatcher implements MessageDispatcher
{
    private array $events;
    
    public function __construct(ContainerContract $container = null)
    {
        $this->listen(
            \Admin\Domain\Event\User\UserRegistered::class,
            \Admin\Entrypoint\Worker\User\RegisteredSubscriber::class . '@consume'
        );
        
        parent::__construct($container);
        
        $this->setQueueResolver(function () {
            return App::make(QueueFactoryContract::class);
        });
    }
    
    public function publish(Event $event): void
    {
        $this->events[] = $event;
    }
    
    public function suppress(Event $event): void
    {
        // TODO: Implement suppress() method.
    }
    
    public function notify(): void
    {
        foreach ($this->events() as $event) {
            $this->dispatch($event);
        }
    }
    
    public function events(): array
    {
        return $this->events;
    }
}
