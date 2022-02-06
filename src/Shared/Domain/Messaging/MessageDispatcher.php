<?php

namespace Shared\Domain\Messaging;

interface MessageDispatcher
{
    public function publish(Event $event): void;

    public function suppress(Event $event): void;

    public function notify(): void;

    public function events(): void;
}
