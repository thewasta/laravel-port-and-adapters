<?php

namespace Admin\Application\User;

use Admin\Application\User\Subscriber\UserSendMailSubscriber;
use Admin\Domain\Service\User\Workers\UserWelcomeMailSender;

class UserSendMailHandler
{
    private UserWelcomeMailSender $service;
    
    public function __construct(UserWelcomeMailSender $service)
    {
        $this->service = $service;
    }
    
    public function handle(UserSendMailSubscriber $subscriber): void
    {
        $this->service->execute($subscriber->payload());
    }
}
