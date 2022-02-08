<?php

namespace Shared\Infrastructure\Notification;

use Illuminate\Notifications\Notifiable;
use Shared\Domain\Notification\ValueObject\NotificationReceivers;
use Shared\Domain\Notification\ValueObject\NotificationContent;
use Shared\Domain\Notification\ValueObject\NotificationReceiver;
use Shared\Domain\Notification\ValueObject\NotificationSender;
use Shared\Domain\Notification\ValueObject\NotificationTitle;

class Notification extends \Illuminate\Notifications\Notification implements \Shared\Domain\Notification\Notification
{
    use Notifiable;
    
    protected NotificationSender $sender;
    
    protected NotificationReceivers $receiver;
    
    protected NotificationTitle $title;
    
    protected NotificationContent $content;
    
    public function send(
        NotificationSender $sender,
        NotificationReceivers $receiver,
        NotificationTitle $title,
        NotificationContent $content,
        array $data
    ): void {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->title = $title;
        $this->content = $content;
        $this->notify($this);
    }
}
