<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyUsersForNewArticle extends Mailable
{
    use Queueable, SerializesModels;

    public $article;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($article, $user)
    {
        $this->article = $article;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       // $site_info = Settings::first();
        $site_name = 'Git Startup';
        $site_email = 'gitstartup.mail@gmail.com';

        return $this->from($site_email, $site_name)
            ->subject("New article Published")
            ->view('emails.notify_new_article');
    }
}
