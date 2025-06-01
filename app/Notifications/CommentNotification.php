<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Comment;
use App\Models\Post;

class CommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $comment;
    protected $post;

    public function __construct(Comment $comment, Post $post)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['mail']; // You can add 'database', 'broadcast', etc. as needed
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('You have a new comment on your post.')
                    ->action('View Comment', route('posts.show', ['id' => $this->post->id]))
                    ->line('Comment: ' . $this->comment->comment);
    }

    public function toArray($notifiable)
    {
        return [
            'comment_id' => $this->comment->id,
            'post_id' => $this->post->id,
            'comment' => $this->comment->comment,
        ];
    }
}
