<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyUsersForNewArticle extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $user)
    {
        $this->message = $message;
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
            ->subject("New Message Send")
            ->view('emails.notify_new_message');
    }
}
