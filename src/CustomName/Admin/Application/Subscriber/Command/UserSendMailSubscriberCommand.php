<?php

namespace Admin\Application\Subscriber\Command;

class UserSendMailSubscriberCommand
{
    public object $payload;
    
    public function __construct(object $payload)
    {
        $this->payload = $payload;
    }
    
    public function payload(): object
    {
        return $this->payload;
    }
}
