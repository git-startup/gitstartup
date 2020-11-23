<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotifyUser extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message,$user)
    {
        $this->user = $user;
        $this->message = $message;
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
           ->view('emails.notify_admin')
           ->subject($this->message['subject'])
           ->with([
                'content' => $this->message['message'],
            ]);
    }
}
