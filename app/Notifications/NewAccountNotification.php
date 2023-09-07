<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Password;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewAccountNotification extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $token = Password::createToken($notifiable);

        $url =  url(route('password.reset', [
            'token' => $token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        $name = $this->user->lastname." ".$this->user->firstname;

        return (new MailMessage)
                    ->subject('Création de compte Arhiviste réussie')
                    ->greeting('Cher(e) ' . $name . ',')
                    ->line('Nous sommes ravis de vous informer que votre compte Archiviste a été créé avec succès !')
                    ->line('Veuillez cliquer sur le bouton ci-dessous pour définir votre mot de passe :')
                    ->action('Continuer', $url)
                    ->line("Nous vous remercions d'avoir rejoint notre application !")
                    ->salutation('Cordialement, ' . config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
