<?php

namespace Shared\Domain\Messaging;

interface Event
{
    public function payload();

    public function occurredOn();
}
