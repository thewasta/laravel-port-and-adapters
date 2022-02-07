<?php

namespace Admin\Domain\Service\User\Workers;

use Shared\Domain\Notification\ValueObject\NotificationContent;
use Shared\Domain\Notification\ValueObject\NotificationReceiver;
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
    
    public function execute(object $payload): void
    {
        $this->notification->send(
            NotificationSender::from('mailsender@mail.com'),
            NotificationReceiver::from('mailreceiver@mail.com'),
            NotificationTitle::from('Mail title .com'),
            NotificationContent::from('errors.503'),
            ["user" => $payload->name()->value()]
        );
    }
}
