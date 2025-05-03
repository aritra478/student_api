<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Notifications\Messages\MailMessage;

class CustomVerifyEmail extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $verifyUrl = $this->verificationUrl($notifiable);

        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject('Verify Your Email Address')
            ->view('vendor.notifications.email', [
                'user' => $notifiable,
                'actionUrl' => $verifyUrl,
            ]);
    }

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
