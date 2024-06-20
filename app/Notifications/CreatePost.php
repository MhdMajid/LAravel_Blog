<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatePost extends Notification
{
    use Queueable;
    private $post_id;
    private $user_create;
    public $post;
    /**
     * Create a new notification instance.
     */
    public function __construct($post_id , $user_create ,$post )
    {
        $this->post_id = $post_id;
        $this->user_create = $user_create;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'post_id' => $this->post_id,
            'photo' => $this->post->photo,
            'user_create' => $this->user_create ,
            'body' => $this->post->title,
            'content' => $this->post->content,
            'slug' => $this->post->slug,
        ];
    }
}
