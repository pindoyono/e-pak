<?php

namespace App\Notifications;

use App\User;
use App\Dupak;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notiflable;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TaskDupakComplete extends Notification
{
    use Queueable;
    private $details;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details = $details;
    }
    
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->subject($this->details['subject'])
                    ->from('admin@e-pakgurukaltara.com', 'Admin E-pak Guru')
                    ->greeting($this->details['greeting'])
                    ->line($this->details['body'])
                    ->line($this->details['saran'])
                    ->line($this->details['tombol'])
                    ->action($this->details['text_action'], $this->details['link1'])
                    ->line($this->details['thanks'])
                    ->salutation($this->details['salutation']);
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
            'data1' => $this->details['list_notif'],
            'link1' => $this->details['link1'],
         ];
    }

}
