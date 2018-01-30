<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SignupNotify extends Notification
{
    use Queueable;

    protected $asset;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($asset)
    {
        $this->asset = $asset;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Elite Car Account Create')
            ->greeting('Hello ' . $this->asset['name'] . '!')
            ->line('Welcome to the Elite Car.')
            ->line('We got a request to create new account. Click the below button to confirm email.')
            ->action('Confirm Email', $this->asset['url'])
            ->line('Thank you for using our application!');
    }
}
