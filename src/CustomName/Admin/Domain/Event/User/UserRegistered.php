<?php

namespace Admin\Domain\Event\User;

use Admin\Domain\Model\User\User;
use DateTimeImmutable;
use Shared\Domain\Messaging\Event;

class UserRegistered implements Event
{
    private User $payload;
    
    private int $occurredOn;
    
    public function __construct(User $user)
    {
        $this->payload = $user;
        $this->occurredOn = (new DateTimeImmutable())->getTimestamp();
    }
    
    public function occurredOn(): int
    {
        return $this->occurredOn;
    }
    
    public function payload(): User
    {
        return $this->payload;
    }
}
