<?php

namespace Shared\Domain\Notification;

use Shared\Domain\Notification\ValueObject\NotificationContent;
use Shared\Domain\Notification\ValueObject\NotificationReceiver;
use Shared\Domain\Notification\ValueObject\NotificationSender;
use Shared\Domain\Notification\ValueObject\NotificationTitle;

interface Notification
{
    public function send(
        NotificationSender $sender,
        NotificationReceiver $receiver,
        NotificationTitle $title,
        NotificationContent $content,
        array $data
    ): void;
}
