<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyUserForNewWorkRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $work_request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($work_request,$user)
    {
        $this->work_request = $work_request;
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
           ->subject("طلب عمل جديد")
           ->view('emails.notify_work_request');
    }
}
