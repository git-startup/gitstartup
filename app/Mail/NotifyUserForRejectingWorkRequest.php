<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyUserForRejectingWorkRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $site_name = 'Git Startup';
      $site_email = 'gitstartup.mail@gmail.com';

      return $this->from($site_email, $site_name)
          ->subject("تم رفض طلب العمل الذي ارسلته")
          ->view('emails.notify_reject_work_request');
    }
}
