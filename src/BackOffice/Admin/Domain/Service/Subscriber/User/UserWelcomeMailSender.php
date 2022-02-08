<?php

namespace Admin\Domain\Service\Subscriber\User;

use Admin\Domain\Model\User\User;
use Shared\Domain\Notification\ValueObject\NotificationContent;
use Shared\Domain\Notification\ValueObject\NotificationReceiver;
use Shared\Domain\Notification\ValueObject\NotificationReceivers;
use Shared\Domain\Notification\ValueObject\NotificationSender;
use Shared\Domain\Notification\ValueObject\NotificationTitle;
use Shared\Infrastructure\Notification\Notification;

class UserWelcomeMailSender
{
    private Notification $notification;
    
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }
    
    public function execute(User $payload): void
    {
        $receivers = [NotificationReceiver::from($payload->email()->value())];
        
        $this->notification->send(
            NotificationSender::from('mailsender@mail.com'),
            NotificationReceivers::from($receivers),
            NotificationTitle::from('Mail title .com'),
            NotificationContent::from('errors.503'),
            ["user" => $payload->name()->value()]
        );
    }
}
