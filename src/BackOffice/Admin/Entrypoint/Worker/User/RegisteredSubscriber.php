<?php

namespace Admin\Entrypoint\Worker\User;

use Admin\Application\Subscriber\User\Command\UserSendMailSubscriberCommand;
use Admin\Domain\Event\User\UserRegistered;
use Admin\Entrypoint\Worker\CommandMessageBus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RegisteredSubscriber extends CommandMessageBus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public function consume(UserRegistered $event): void
    {
        $this->bus->handle(new UserSendMailSubscriberCommand($event->payload()));
    }
}
