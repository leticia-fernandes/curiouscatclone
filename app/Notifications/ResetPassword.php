<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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

        $countTime = config('auth.passwords.users.expire');
        $application = config('app.name');

        return (new MailMessage)
                    ->greeting('Olá!')
                    ->subject('Notificação de Alteração de Senha')
                    ->line('Você está recebendo esse email porque foi requisitado a alteração de senha da sua conta.')
                    ->action('Criar nova senha', url(config('app.url').route('password.reset', ['token' => $this->token], false)))
                    ->line("O link irá expirar em $countTime minutos.")
                    ->line('Se não foi você quem requisitou a alteração da senha, nenhuma ação será necessária.')
                    ->salutation("Atenciosamente, $application");
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
