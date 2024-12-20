<?php

namespace App\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; 
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AlertsNotification extends Notification
{
    use Queueable; 
    
    protected $project;

    public function __construct($project)
    {
        $this->project = $project; 
    }

    // Canales de entrega de notificaciones
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    // Mensaje para el correo
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->project['greeting'])
                    ->line($this->project['body'])
                    ->action($this->project['actionText'], $this->project['actionURL'])
                    ->line($this->project['thanks']);
    }

    // Notificación para la base de datos
    public function toDatabase($notifiable)
    {
        return [
            'project_id' => $this->project['id']
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
