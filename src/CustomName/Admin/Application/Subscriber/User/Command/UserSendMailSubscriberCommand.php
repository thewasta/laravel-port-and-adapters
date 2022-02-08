<?php

namespace Admin\Application\Subscriber\User\Command;

use Admin\Domain\Model\User\User;

class UserSendMailSubscriberCommand
{
    public User $payload;
    
    public function __construct(User $payload)
    {
        $this->payload = $payload;
    }
    
    public function payload(): User
    {
        return $this->payload;
    }
}
