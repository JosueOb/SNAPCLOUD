<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
// use Illuminate\Notifications\Notification;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

// use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\URL;
// use Illuminate\Support\Facades\Lang;
// use Illuminate\Support\Facades\Config;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class UserVerifyEmail extends VerifyEmailBase
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
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return (new MailMessage)
            ->subject('Verifiación del correo electrónico')
            ->line('Por favor, haga clic en el botón de abajo para verificar su dirección de correo electrónico')
            ->action('Verificar correo electrónico', $verificationUrl)
            ->line('Si no ha creado una cuenta, no se requiere de ninguna otra acción');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
