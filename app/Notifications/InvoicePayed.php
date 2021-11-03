<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Pusher\Pusher;
use Illuminate\Notifications\Message\BroadcastMessage;

class InvoicePayed extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $title;
    public $info;
    public function __construct($title, $info)
    {
        $this->title = $title;
        $this->info = $info;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                ->line($this->title)
                ->action('Notification Action', url('/'))
                ->line($this->info);
    }
    public function toDatabase($notifiable){
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'), 
            env('PUSHER_APP_ID'), 
            $options
        );
        $data = ['title' => $this->title,'info' => $this->info];
        $pusher->trigger('warkaorder'.$notifiable->id, 'App\\Events\\PaymentProcessed',$data);
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        return $data;
    }
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => $this->title,
            'info' => $this->info
        ]);
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
