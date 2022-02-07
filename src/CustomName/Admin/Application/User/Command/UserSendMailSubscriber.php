<?php

namespace Admin\Application\User\Command;

class UserSendMailSubscriber
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
