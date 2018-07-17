<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Smsapi\SmsapiChannel;
use NotificationChannels\Smsapi\SmsapiSmsMessage;

class SmsApi extends Notification {

    use Queueable;

    public function __construct() {
        //
    }

    public function via($notifiable) {
        return [SmsapiChannel::class];
    }

    public function toSmsapi($notifiable) {
        return (new SmsapiSmsMessage())->to('506130288')->content("Buy now your flight!");
    }

    public function toMail($notifiable) {
        return (new MailMessage)
                        ->line('The introduction to the notification.')
                        ->action('Notification Action', url('/'))
                        ->line('Thank you for using our application!');
    }

    public function toArray($notifiable) {
        return [
                //
        ];
    }

    public function routeNotificationForSmsapi() {
        return $this->phone_number;
    }

}
