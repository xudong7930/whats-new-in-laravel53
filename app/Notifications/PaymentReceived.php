<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class PaymentReceived extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    
    public function toSlack()
    {
        return (new SlackMessage)
            ->success()
            ->content('we received your payment, thank you for your purchase')
            ->attachment(function ($payload) {
                $payload->title('Payment xuergou', url('/payment/1'))
                    ->fields([
                        'Amount' => '$ 699.00',
                        'From' => 'Vultrl.com'
                    ]);
            });
    }
}
