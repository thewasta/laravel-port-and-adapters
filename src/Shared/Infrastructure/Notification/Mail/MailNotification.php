<?php

namespace Shared\Infrastructure\Notification\Mail;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Shared\Domain\Notification\ValueObject\NotificationReceivers;
use Shared\Domain\Notification\ValueObject\NotificationContent;
use Shared\Domain\Notification\ValueObject\NotificationSender;
use Shared\Domain\Notification\ValueObject\NotificationTitle;
use Shared\Infrastructure\Notification\Notification;

class MailNotification extends Notification
{
    public function send(
        NotificationSender $sender,
        NotificationReceivers $receiver,
        NotificationTitle $title,
        NotificationContent $content,
        array $data
    ): void {
        Mail::send($content->value(), $data,
            static function (Message $message) use ($sender, $receiver, $title, $content) {
                $message->from($sender->value())->to($receiver->toString())->subject($title->value());
            });
    }
}
