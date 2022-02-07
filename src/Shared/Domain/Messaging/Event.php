<?php

namespace Shared\Domain\Messaging;

interface Event
{
    public function payload(): object;
    
    public function occurredOn(): int;
}
