<?php

namespace Admin\Application\Subscriber\User;

use Admin\Application\Subscriber\User\Command\UserSendMailSubscriberCommand;
use Admin\Domain\Service\Subscriber\User\UserWelcomeMailSender;

class UserSendMailHandler
{
    private UserWelcomeMailSender $service;
    
    public function __construct(UserWelcomeMailSender $service)
    {
        $this->service = $service;
    }
    
    public function handle(UserSendMailSubscriberCommand $subscriber): void
    {
        $this->service->execute($subscriber->payload());
    }
}
