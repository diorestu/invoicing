<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;

class SendTelegram extends Notification
{
    use Queueable;

    protected $message, $url;
    public function __construct($msg)
    {
        $this->message  = $msg;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['telegram'];
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->to('-4040436169')
            ->content($this->message);
    }
}
